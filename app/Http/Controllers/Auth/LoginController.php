<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {

        $this->validate($request, [
            $this->username() => 'required|email|exists:users,email',
            'password' => 'required'
        ], [
            'email.required' => 'Поле "E-mail" обязательно для заполнения',
            'email.exists' => 'Пользователя с таким "E-mail" не существует',
            'email.email' => 'Поле "E-mail" должно соответствовать формату name@domain.com',
            'password.required' => 'Поле "Пароль" обязательно для заполнения',
        ]);
        $user = User::where('email', '=', $request['email'])->withTrashed()->first();
        if ($user->trashed()) {
            throw ValidationException::withMessages([
                $this->username() => [trans('Пользователь с таким "E-mail" удален')],
            ]);
        }
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('Неверный пароль')],
        ]);
    }
}
