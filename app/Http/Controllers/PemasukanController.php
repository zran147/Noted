<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\User;
use App\Models\Kategoripemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
    
        // Fetch pemasukans for the authenticated user
        $pemasukans = $user->pemasukan()->latest()->get();
    
        // dd($pemasukans);
    
        return view('pemasukan.index', [
            'pemasukans' => $pemasukans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoripemasukans = Kategoripemasukan::all();
        return view('pemasukan.create', [
            'kategoripemasukans' => $kategoripemasukans
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'judul_pemasukan' => 'required|max:255',
        'kategoripemasukan' => 'required',
        'pemasukan_nominal' => 'required'
    ]);

    $validatedData['userspemasukan_id'] = auth()->user()->id;

    // Generate the slug based on the judul_pemasukan
    $slug = Str::slug($request->judul_pemasukan);
    $validatedData['slug'] = $slug;

    // Retrieve the category ID based on the selected category's name
    $kategori = Kategoripemasukan::where('nama', $request->kategoripemasukan)->first();
    if ($kategori) {
        $validatedData['kategoripemasukan_id'] = $kategori->id;
    }


  // Create a new Pemasukan model
  $pemasukan = Pemasukan::create($validatedData);

//   dd($pemasukan);

  // Update saldo for the associated user
  $user = User::find($validatedData['userspemasukan_id']);
  $user->updateSaldo();
 
     return redirect('/transactions')->with('success', 'New transaction has been added!');
}




    /**
     * Display the specified resource.
     */
    public function show(Pemasukan $pemasukan)
    {
        return view('/transactions', [
            "title" => "Single pemasukan",
            "pemasukan" => $pemasukan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemasukan $pemasukan)
    {
        $kategoripemasukan = Kategoripemasukan::all();
        return view('pemasukan.edit', compact('pemasukan', 'kategoripemasukan'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemasukan $pemasukan)
    {
        $validatedData = $request->validate([
            'judul_pemasukan' => 'required|max:255',
            'kategori_pemasukan' => 'required',
            'pemasukan_nominal' => 'required'
        ]);
    
        $pemasukan->update($validatedData);

        // Update saldo for the associated user
        $user = $pemasukan->userspemasukan;
        $user->updateSaldo();
    
        return redirect('/transactions')->with('success', 'Transaction has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $pemasukan = Pemasukan::findOrFail($id);
    $pemasukan->delete();


        // Update saldo for the associated user
        $user = $pemasukan->userspemasukan;
        $user->updateSaldo();

    return redirect('/transactions')->with('success', 'Transaction deleted successfully.');
}
}