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
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
        
        // Custom validation error messages
        $messages = [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name must not exceed :max characters.',
            
            'email.required' => 'The email field is required.',
            'email.string' => 'The email must be a string.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email must not exceed :max characters.',
            'email.unique' => 'The email has already been taken.',
            
            'password.required' => 'The password field is required.',
            'password.confirmed' => 'The password confirmation does not match.',
            // Add more messages for password rules if needed
        ];
        
        // Use the $rules and $messages in your validation logic
        $request->validate($rules, $messages);
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
