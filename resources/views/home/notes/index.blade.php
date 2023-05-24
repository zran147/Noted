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

    {{-- Bootstrap Dashboard Mulai --}}

      {{-- <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="note-judul">DPP</h5>
          <p class="note-kategori">User Persona</p>
          <a href="#" class="btn btn-primary stretched-link"></a>
        </div>
      </div> --}}

      
      
@endsection
