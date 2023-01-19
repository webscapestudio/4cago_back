<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email'], [
            'email.required' => 'Поле "E-mail" обязательно для заполнения',
            'email.exists' => 'Пользователя с таким "E-mail" не существует',
            'email.email' => 'Поле "E-mail" должно соответствовать формату name@domain.com',

        ]);

        $user = User::where('email', '=', $request['email'])->withTrashed()->first();
        if ($user->trashed()) {
            throw ValidationException::withMessages([
                'email' => [trans('Пользователь с таким "E-mail" удален')],
            ]);
        }
    }

    use SendsPasswordResetEmails;
}
