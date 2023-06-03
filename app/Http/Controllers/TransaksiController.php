<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Kategoritransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
    
        // Fetch transaksis for the authenticated user
        $transaksis = $user->transaksi()->latest()->get();
    
        // dd($transaksis);
    
        return view('transaksi.index', [
            'transaksis' => $transaksis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoritransaksis = Kategoritransaksi::all();
        return view('transaksi.create', [
            'kategoritransaksis' => $kategoritransaksis
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_transaksi' => 'required|max:255',
            'kategoritransaksi_id' => 'required',
            'jenis_transaksi' => 'required|in:pemasukan,pengeluaran',
            'nominal_transaksi' => 'required'
        ], [
            'jenis_transaksi.required' => 'Please choose the transaction type (Pemasukan or Pengeluaran).'
        ]);
    
        // dd($validatedData);

        $kategori = Kategoritransaksi::findOrFail($request->kategoritransaksi_id);
        $validatedData['kategoritransaksi_id'] = $kategori->id;
        $validatedData['userstransaksi_id'] = auth()->user()->id;



    // Generate the slug based on the judul_transaksi
    $slug = Str::slug($request->judul_transaksi);
    $validatedData['slug'] = $slug;

    // Retrieve the category ID based on the selected category's name
    $kategori = Kategoritransaksi::where('nama', $request->kategoritransaksi)->first();
    if ($kategori) {
        $validatedData['kategoritransaksi_id'] = $kategori->id;
    }



  // Create a new transaksi model
  $transaksi = Transaksi::create($validatedData);


  // Update saldo for the associated user
  $user = User::find($validatedData['userstransaksi_id']);
  $user->updateSaldo();
 
     return redirect('/transactions')->with('success', 'New transaction has been added!');
}




    /**
     * Display the specified resource.
     */
    public function show(transaksi $transaksi)
    {
        $kategoritransaksi = Kategoritransaksi::findOrFail($transaksi->kategoritransaksi_id);

        return view('transaksi.show', [
            "title" => "Single transaksi",
            "transaksi" => $transaksi,
            "kategoritransaksi" => $kategoritransaksi

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $kategoritransaksis = Kategoritransaksi::all();
    
        return view('transaksi.edit', compact('transaksi', 'kategoritransaksis'));
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaksi $transaksi)
    {
        $validatedData = $request->validate([
            'judul_transaksi' => 'required|max:255',
            'kategori_transaksi' => 'required',
            'transaksi_nominal' => 'required'
        ]);
    
        $transaksi->update($validatedData);

        // Update saldo for the associated user
        $user = $transaksi->userstransaksi;
        $user->updateSaldo();
    
        return redirect('/transactions')->with('success', 'Transaction has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $transaksi = transaksi::findOrFail($id);
    $transaksi->delete();


        // Update saldo for the associated user
        $user = $transaksi->userstransaksi;
        $user->updateSaldo();

    return redirect('/transactions')->with('success', 'Transaction deleted successfully.');
}


public function createGraph()
{
    $currentMonth = Carbon::now()->format('Y-m');

    $pemasukan = Transaksi::where('jenis_transaksi', 'pemasukan')
        ->where('tanggal_transaksi', 'like', $currentMonth.'%')
        ->sum('nominal_transaksi');

    $pengeluaran = Transaksi::where('jenis_transaksi', 'pengeluaran')
        ->where('tanggal_transaksi', 'like', $currentMonth.'%')
        ->sum('nominal_transaksi');

    return view('transaksi.index', compact('pemasukan', 'pengeluaran'));
}

}