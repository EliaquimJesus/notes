<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function index(int $value): View
    {
        return view('main', ['value' => $value]);
    }
}