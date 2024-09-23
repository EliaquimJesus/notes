<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(): string
    {
       return  'login';
    }

    public function logout(): string
    {
        return 'logout';
    }
}