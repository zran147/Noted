@extends('layouts.main')
@section('before')
    @include('partials.navbar', ['title' => 'Home'])
@endsection

@section('container')
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
        </div>
    @endif

    <h1>Noted.</h1>  
      
@endsection
