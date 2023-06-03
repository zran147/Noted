<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Kategorinotes;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class HomeNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home.notes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.notes.create', [
            'kategori_notes' => Kategorinotes::all()
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_note' => 'required|max:255',
            'slug' => 'required|unique:notes',
            'kategori_note' => 'required',
            'isi_note' => 'required'
        ]);
    
        $validatedData['user_id'] = auth()->user()->id;
    
        // Retrieve the category ID based on the selected category's name
        $kategori = Kategorinotes::where('nama', $request->kategori_note)->first();
        if ($kategori) {
            $validatedData['kategorinotes_id'] = $kategori->id;
        }        
        // dd($validatedData);
        Note::create($validatedData);
    
        return redirect('/notes')->with('success', 'New note has been added!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {

    }
    

    /**
     * Show the form for editing the specified resource.
     */
    
     public function edit(Note $note)
     {
         $note->load('kategori'); // Eager load the 'kategori' relationship
         $kategori_notes = Kategorinotes::all();
     
         return view('home.notes.edit', compact('note', 'kategori_notes'));
     }
     
    /**
     * Update the specified resource in storage.
     */

public function update(Request $request, Note $note)
{
    $request->validate([
        'judul_note' => 'required',
        'kategori_note' => 'required',
        'isi_note' => 'required',
    ]);

    $note->update([
        'judul_note' => $request->judul_note,
        'slug' => $request->slug,
        'kategorinotes_id' => $request->kategori_note,
        'isi_note' => $request->isi_note,
    ]);
    
    return redirect('/notes')->with('success', 'Note updated successfully.');
}

     

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();
    
        return redirect('/notes')->with('success', 'Note deleted successfully.');
    }
    
    

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Note::class, 'slug', $request->judul_note);
        return response()->json(['slug' => $slug]);
    }
}
