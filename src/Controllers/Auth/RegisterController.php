<?php


namespace BuildUp\Dashboard\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('dashboard::auth.register');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'confirmed'],
            'password' => ['required', 'string', 'min:8'],
        ],
        [
            'name.required' => trans('dashboard::validation.required', ['attribute' => ucfirst(trans('dashboard::validation.attributes.name'))]),
            'email.required' => trans('dashboard::validation.required', ['attribute' => ucfirst(trans('dashboard::validation.attributes.email'))]),
            'email.email' => trans('dashboard::validation.email', ['attribute' => ucfirst(trans('dashboard::validation.attributes.email'))]),
            'email.confirmed' => trans('dashboard::validation.confirmed', ['attribute' => ucfirst(trans('dashboard::validation.attributes.email'))]),
            'password.required' => trans('dashboard::validation.required', ['attribute' => ucfirst(trans('dashboard::validation.attributes.password'))]),
            'password.min' => trans('dashboard::validation.min.numeric', ['attribute' => ucfirst(trans('dashboard::validation.attributes.email'))]),
        ]

    );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
