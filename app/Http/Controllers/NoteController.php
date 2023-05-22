<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    // public function index() {
    //     return view('notes', [
    //         "title" => "Notes", 
    //         "active" => 'notes',
    //         "notes" => Note::latest()->filter(request(['search']))->get()
    //     ]);
    // }

    //Route model binding
    public function show(Note $note) {
        return view('note', [
            "title" => "Single note",
            "note" => $note 
        ]);
    }

//     public function index() {
//         $user = auth()->user();
//         $notes = $user->notes;

//         return view('notes', compact('notes'));
// }

public function index()
{
    $user = auth()->user();
    $notes = $user->notes;

    return view('notes', [
        "title" => "Notes",
        "active" => 'notes',
        "notes" => $notes
    ]);
}


}