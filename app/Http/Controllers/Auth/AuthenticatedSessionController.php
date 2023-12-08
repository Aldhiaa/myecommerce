<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\SiteSetting;
class AuthenticatedSessionController extends Controller
{
    
    public function create(): View
    {
        $setting = SiteSetting::find(1);
        return view('auth.login',compact('setting'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $url= '';

        if ($request->user()->role === 'admin') {
            $url='admin/dashboard';
        }
        elseif ($request->user()->role === 'vendor') {
            $url='vendor/dashboard';
        }else {
            $url='dashboard';
        }

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
