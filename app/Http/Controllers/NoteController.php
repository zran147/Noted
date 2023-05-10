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

    public function show($slug) {
        return view('note', [
            "title" => "Single note",
            "note" => Note::find($slug)
        ]);
    }
}
