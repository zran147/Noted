<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index() {
        return view('notes', [
            "title" => "Notes",
            "notes" => Note::all()
        ]);
    }

    //Route model binding
    public function show(Note $note) {
        return view('note', [
            "title" => "Single note",
            "note" => $note 
        ]);
    }
}