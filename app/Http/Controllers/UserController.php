<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategoritransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
        
        // Update the saldo for the user
        $this->updateSaldo($user);
    
        // Retrieve the updated saldo value for the user
        $saldo = $user->saldo;
    
        // Pass the saldo variable to the view
        return view('home')->with('saldo', $saldo);
    }
}
