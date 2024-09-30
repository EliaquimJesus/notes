<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private User $user_x)
    {
        
    }
    //
    public function login(): View
    {
       return  view('login');
    }

    public function loginSubmit(Request $request): mixed
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
           
        // get user input
        $username = $request->input('text_username');
        $password = $request->input('text_password');
        
        // check if user exists
        $user = $this->user_x::where('username', $username)->where('deleted_at', NULL)->first();
        
        // check if user or password is correct 
        if(!$user || !password_verify($password, $user->password)){
            return redirect()->back()->withInput()->with('loginError', 'Username ou password incorrectos.');
        }

        // update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        // login user
        session([
            'user' => [
                'id'       => $user->id,
                'username' => $user->username
            ]
        ]);

        // redirect to home
        return redirect()->to('/');
    }

    public function logout(): mixed 
    {
        // logout from the aplication
        session()->forget('user');

        return redirect()->to('/login');
    }
}