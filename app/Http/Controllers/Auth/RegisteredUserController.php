<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Notifications\VerifyEmail;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $verification_code = rand(100000, 999999);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_code' => $verification_code,
        ]);

        event(new Registered($user));
        
        // // Check if the user's email is verified
        // if (!$user->hasVerifiedEmail()) {
        //     return redirect()->route('verification.notice')
        //         ->with('message', 'Please verify your email address to continue.');
        // }
        Auth::login($user);

        $user->notify(new VerifyEmail($verification_code));

        // return $user;
        return redirect()->route('verify.code.form')->with('email', $request->email);

    }
    public function verifyCodeForm()
    {
        return view('auth.verify-code');
    }
    
    public function verifyCode(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|size:6',
        ]);
        // $user = User::where('email', $request->session()->get('email'))
        // ->where('verification_code', $request->verification_code)
        // ->first();
        $user = User::where('verification_code', $request->verification_code)->first();
    
        if (!$user) {
            return back()->withErrors(['verification_code' => 'Invalid verification code.']);
        }
    
        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->save();
    
        return redirect()->route('dashboard')->with('status', 'Email verified successfully.');
    }
}
