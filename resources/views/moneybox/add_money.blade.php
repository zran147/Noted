<!-- add_money.blade.php -->
@extends('layouts.main')

@section('before')
@include('partials.navbar', ['title' => 'Home'])
@endsection

@section('container')
    <h1>Add Money to MoneyBox</h1>

    <form action="{{ route('moneybox.saveMoney', $moneybox->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="additionalAmount" class="form-label">Additional Amount</label>
            <input type="number" name="additionalAmount" id="additionalAmount" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Money</button>
    </form>
@endsection
