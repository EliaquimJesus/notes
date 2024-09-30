<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function __construct(private User $user, private Note $note)
    {
        
    }
    
    public function index(): View
    {
        // load user´s notes
        $id = session('user.id');
        $notes = $this->user->find($id)->notes()->get()->toArray();

        // show home view
        return view('home', ['notes' => $notes]);
    }

    // create a new note
    public function newNote(): View
    {
        // show new note view
        return view('new_note');
    }

    public function newNoteSubmit(Request $request): mixed
    {
        // validate request
        $request->validate(
            // rules
            [
                'text_title' => 'required|min:3|max:200',
                'text_note'  => 'required|min:3|max:3000'
            ],
            // error message
            [
                'text_title.required'     => 'O titulo é obrigatório',
                'text_title.min' => 'O titulo deve ter pelo menos :min caracteres',
                'text_title.max' => 'O titulo deve ter no máximo :max caracteres',

                'text_note.required'      => 'A nota é obrigatória',
                'text_note.min'  => 'A nota deve ter pelo menos :min caracteres',
                'text_note.max'  => 'A nota deve ter no máximo :max caracteres',
            ]
        );

        // get user id
        $id = session('user.id');

        // create new note
        $this->note->user_id  = $id;
        $this->note->title    = $request->text_title;
        $this->note->text     = $request->text_note;
        $this->note->save();

        // redirect to homepage
        return redirect()->route('home');
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