<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        // load user´s notes

        // show home view
        return view('home');
    }

    public function newNote(): string
    {
        return 'APP NEW NOTE CREATE!';
    }
}