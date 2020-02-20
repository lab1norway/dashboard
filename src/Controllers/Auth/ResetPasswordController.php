<?php

namespace BuildUp\Dashboard\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';


    public function showResetForm(Request $request, $token = null)
    {
        return view('dashboard::auth.password.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function sendResetResponse(Request $request, $response)
    {
        return redirect($this->redirectPath())
                            ->with('status', trans('dashboard::' . $response));
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans('dashboard::' . $response)]);
    }


    protected function validationErrorMessages()
    {
        return [
            'email.required' => trans('dashboard::validation.required', ['attribute' => ucfirst(trans('dashboard::validation.attributes.email'))]),
            'email.email' => trans('dashboard::validation.email', ['attribute' => ucfirst(trans('dashboard::validation.attributes.email'))]),
            'password.required' => trans('dashboard::validation.required', ['attribute' => ucfirst(trans('dashboard::validation.attributes.password'))]),
            'password.min' => trans('dashboard::validation.min', ['attribute' => ucfirst(trans('dashboard::validation.attributes.password'))])
        ];
    }
}
