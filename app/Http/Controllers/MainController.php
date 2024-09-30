<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Crypt;

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

    public function editNote($id): string
    {
        
        $id = $this->decryptId($id);
        
        return "I´m editing note with id = $id";
    }

    public function deleteNote($id): string
    {
        $id = $this->decryptId($id);
        
        return "I´m deleting note with id = $id";
    }

    private function decryptId($id): mixed
    {
        // check if id is encrypyed
        try {
            //code...
            $id = Crypt::decrypt($id);

        } catch (DecryptException $e) {
            //throw $th;
            return redirect()->route('home');
        }

        return $id;
    }
}