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

        // Pass the saldo variable to the view
        return view('home')->with('saldo', $saldo);
    }
}
