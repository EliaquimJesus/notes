<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Operations;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function __construct(private User $user_x)
    {
        
    }
    
    public function index(): View
    {
        // load user´s notes
        $id = session('user.id');
        $notes = $this->user_x->find($id)->notes()->get()->toArray();

        // show home view
        return view('home', ['notes' => $notes]);
    }

    // create a new note
    public function newNote(): View
    {
        // show new note view
        return view('new_note');
    }

    public function newNoteSubmit(Request $request)
    {
        return "I´m creatin a new note";
    }

    // edit a note
    public function editNote(string $id): string 
    {
        $id = Operations::decryptId($id);
        
        return "I´m editing note with id = $id";
    }

    // delete a note
    public function deleteNote(string $id): string 
    {
        $id = Operations::decryptId($id);
        
        return "I´m deleting note with id = $id";
    }

    
}