<?php


namespace BuildUp\Dashboard\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller 
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function showLoginForm()
    {
        return view('dashboard::auth.login');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('dashboard::auth.failed')],
        ]);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ],
        [
            'password.required' => trans('dashboard::validation.required', ['attribute' => trans('dashboard::validation.attributes.password')]),
            $this->username() . '.required' => trans('dashboard::validation.required', ['attribute' => trans('dashboard::validation.attributes.email')])
        ]
    
    );
    }
    
}