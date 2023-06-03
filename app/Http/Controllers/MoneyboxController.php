<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Moneybox;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;



class MoneyboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $moneyboxes = $user->moneybox()->latest()->get();
        // dd($moneyboxes);
        return view('moneybox.index', [
            'moneyboxes' => $moneyboxes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('moneybox.create', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_moneybox' => 'required',
            'target_moneybox' => 'required|numeric',
            'nominal_moneybox' => 'required|numeric',
            'tanggal_selesai' => 'required|date',
        ]);
        // dd($validatedData);
        $validatedData['usersmoneybox_id'] = auth()->user()->id;

        // Generate the slug based on the judul_transaksi
        $slug = Str::slug($request->judul_moneybox);
        $validatedData['slug'] = $slug;

        // Create a new transaksi model
        $moneybox = Moneybox::create($validatedData);

        return redirect('/moneybox')->with('success', 'New transaction has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Moneybox $moneybox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $moneybox = Moneybox::findOrFail($id);

        return view('moneybox.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Moneybox $moneybox)
    {
        $validatedData = $request->validate([
            'judul_moneybox' => 'required|max:255',
            'target_moneybox' => 'required',
            'nominal_moneybox' => 'required',
            'tanggal_selesai' => [
                'required',
                Rule::after(Carbon::now()->format('Y-m-d')),
            ],
        ]);

        $moneybox->update($validatedData);

        return redirect('/moneybox')->with('success', 'Moneybox has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $moneybox = Moneybox::findOrFail($id);
        $moneybox->delete();

        return redirect('/moneybox')->with('success', 'Moneybox deleted successfully.');
    }

    public function addMoney(Request $request, $id)
    {
        $moneybox = Moneybox::findOrFail($id);
        $additionalAmount = $request->input('additionalAmount');
    
        $moneybox->nominal_moneybox += $additionalAmount;
        $moneybox->save();
    
        return redirect('/moneybox')->with('success', 'Money added successfully!');
    }

    public function showAddMoneyForm($id)
{
    $moneybox = Moneybox::findOrFail($id);

    return view('moneybox.add_money', [
        'moneybox' => $moneybox,
    ]);
}

public function saveMoney(Request $request, $id)
{
    $moneybox = Moneybox::findOrFail($id);
    $additionalAmount = $request->input('additionalAmount');

    $moneybox->nominal_moneybox += $additionalAmount;
    $moneybox->save();

    return redirect('/moneybox')->with('success', 'Money added successfully!');
}


    
}