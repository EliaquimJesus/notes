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

    public function logout(): string
    {
        return 'logout';
    }
}