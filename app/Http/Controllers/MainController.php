<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function index(): string
    {
        return 'APP HOME READY....';
    }

    public function newNote():string
    {
        return 'APP NEW NOTE CREATE!';
    }
}