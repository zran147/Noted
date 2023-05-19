@extends('layouts.main')
<link rel="stylesheet" href="css/login.css">

@section('before')
<div class="col-2 col-sm-4 col-md-6 col-lg-7" id="brown"></div>
@endsection

@section('container')
<div class="row justify-content-center">
    <div class="col-10 col-sm-8 col-md-8 col-lg-7">
        <main class="form-signin w-100 m-auto text-center">
            <h1 class="display-5 mb-5 fw-normal" id="noted">Noted.</h1>
            <form class="text-left poppins brown" action="{{ route('login') }}" method="post">
              <div class="p-1">Username</div>
              @csrf
              <div class="form-floating mb-2">
                <input type="username" name="username" class="form-control form-control-md @error('username') is-invalid @enderror" id="floatingInput" autofocus required value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="p-1">Password</div>
              <div class="form-floating mb-5">
                <input type="password" name="password" class="form-control form-control-md"  id="password" required>
              </div>
              <div class="p-1 d-flex justify-content-between">
                <small>Not Registered?</small>
                <small><a href="/register">Register</a></small>
              </div>

              <button class="w-100 btn btn-md btn-primary" type="login">Login</button>
            </form>
        </main>
    </div>
</div>
@endsection