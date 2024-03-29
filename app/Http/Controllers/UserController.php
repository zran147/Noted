<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategoritransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Apply auth middleware to all methods in the controller
    }

    public function updateSaldo(User $user)
    {
        $totalPemasukan = $user->transaksi()->where('jenis_transaksi', 'pemasukan')->sum('nominal_transaksi');
        $totalPengeluaran = $user->transaksi()->where('jenis_transaksi', 'pengeluaran')->sum('nominal_transaksi');
        $user->saldo = $totalPemasukan - $totalPengeluaran;
        $user->save();
    }

    public function showHomePage()
    {
        $user = Auth::user();
    
        // Make sure user is authenticated
        if (!$user) {
            return redirect('/login'); // Redirect to login if user is not authenticated
        }
    
        // Update the saldo for the user
        $this->updateSaldo($user);
    
        // Retrieve the updated saldo value for the user
        $saldo = $user->saldo;
    
        // Get the transaksis for the user
        $transaksis = $user->transaksi;
    
        // Retrieve the kategoriData for the user
        $kategoriData = Kategoritransaksi::leftJoin('transaksi', 'kategoritransaksi.id', '=', 'transaksi.kategoritransaksi_id')
            ->select('kategoritransaksi.nama')
            ->selectRaw('SUM(CASE WHEN transaksi.jenis_transaksi = "pemasukan" THEN transaksi.nominal_transaksi ELSE 0 END) AS pemasukan')
            ->selectRaw('SUM(CASE WHEN transaksi.jenis_transaksi = "pengeluaran" THEN transaksi.nominal_transaksi ELSE 0 END) AS pengeluaran')
            ->where('transaksi.userstransaksi_id', $user->id)
            ->groupBy('kategoritransaksi.id', 'kategoritransaksi.nama') // Include 'kategoritransaksi.nama' in GROUP BY
            ->get();
    
        // Pass the transaksis, saldo, and kategoriData variables to the view
        return view('home', compact('transaksis', 'saldo', 'kategoriData'));
    }
    
    
    
}
