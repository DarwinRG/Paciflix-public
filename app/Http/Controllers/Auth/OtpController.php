<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Otp;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;


class OtpController extends Controller
{
    public function showVerifyForm()
    {
        return view('auth.verify-otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string',
        ]);

        $otp = Otp::where('email', $request->email)->where('otp', $request->otp)->first();

        if ($otp) {
            // OTP is valid, create the user
            $user = User::create([
                'name' => session('name'),
                'email' => $request->email,
                'password' => Hash::make(session('password')),
            ]);
            Auth::login($user);
            return redirect()->route('home')->with('status', 'Registration successful. Welcome!');
        }

        return back()->withErrors(['otp' => 'Invalid OTP']);
    }
}