<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Kategorinotes;

class NoteController extends Controller
{
    //Route model binding
    public function show(Note $note) {
        return view('note', [
            "title" => "Single note",
            "note" => $note 
        ]);
    }

    public function index()
    {
        $user = auth()->user();
        $notes = Note::query()
            ->where('user_id', $user->id)
            ->orderByDesc('updated_at')
            ->get();
    
        return view('notes', [
            "title" => "Notes",
            "active" => 'notes',
            "notes" => $notes
        ]);
    }
    

    public function academics() {
        $user = auth()->user();
        $category = Kategorinotes::where('nama', 'Academics')->first(); 
        $notes = $user->notes()->where('id', $category->id)->get();

    return view('academics', [
        "title" => "Academics",
        "active" => 'academics',
        "notes" => $notes
    ]);
}

public function create()
{
    return view('home.notes.create');
}

public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_note' => 'required|max:255',
            'slug' => 'required|unique:notes',
            'kategori_id' => 'required',
            'isi_note' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Note::create($validatedData);

        return redirect('/notes')->with('success', 'New note has been added!');
    }

    

    
}