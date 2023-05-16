<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index() {


        // $notes = Note::latest();
        // if(request('search')) {
        //     $notes->where('judul_note', 'like', '%' . request('search') . '%')
        //     -> orWhere('isi_note', 'like', '%' . request('search') . '%');
        // }
        return view('notes', [
            "title" => "Notes", 
            "active" => 'notes',
            "notes" => Note::latest()->filter(request(['search']))->get()
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