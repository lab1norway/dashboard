<?php

namespace BuildUp\Dashboard\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('dashboard::auth.password.email');
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return back()->with('status', trans('dashboard::passwords.sent'));
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => trans('dashboard::' . $response)]);
    }

    protected function validateEmail(Request $request)
    {
        $request->validate(
            ['email' => 'required|email'],
            ['email.required' => trans('dashboard::validation.required', ['attribute' => ucfirst(trans('dashboard::validation.attributes.email'))])]);
    }
}
