<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    // ... Other methods

    public function showVerifyForm()
    {
        return view('backend.dashboard.layouts.verify-form');
    }

    public function verifyNumber(Request $request)
    {
        $request->validate([
            'otp_code' => 'required|integer',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('verify.form')->with('error', 'User not authenticated.');
        }

        if (!($user instanceof User)) {
            return redirect()->route('verify.form')->with('error', 'Invalid user instance.');
        }

        $inputCode = $request->input('otp_code');

        if ($inputCode == $user->verify_code) {
            $user->verify_code = $inputCode; 
            $user->number_verified_at = now();
            $user->save();

            return redirect()->route('verify.form')->with('success', 'YOUR NUMBER IS SUCCESSFULLY VERIFIED');
        }

        return redirect()->route('verify.form')->with('error', 'OTP INCORRECT');
    }
}
