<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function index(User $user_x): View
    {
        // load user´s notes
        $id = session('user.id');
        $notes = $user_x->find($id)->notes()->get()->toArray();

        // show home view
        return view('home', ['notes' => $notes]);
    }

    public function newNote(): string
    {
        return 'APP NEW NOTE CREATE!';
    }
}