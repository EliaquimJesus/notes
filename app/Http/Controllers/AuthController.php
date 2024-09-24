<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(): View
    {
       return  view('login');
    }

    public function loginSubmit(Request $request): string
    {
        /*
         * Form validation
         */

        $request->validate(
            // rules
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            // error message
            [
                'text_username.required' => 'O username é obrigatório',
                'text_username.email'    => 'O username deve ser um email válido',
                'text_password.required' => 'A password é obrigatória',
                'text_password.min'      => 'A password deve ter pelo menos :min caracteres',
                'text_password.max'      => 'A password deve ter no máximo :max caracteres'
            ]
            );
            
        return $request->input('text_username') . '<br>' . $request->input('text_password');
    }

    public function logout(): string
    {
        return 'logout';
    }
}