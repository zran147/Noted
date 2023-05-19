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
            <form class="text-left poppins brown">
              <div class="p-1">Username</div>
              <div class="form-floating mb-2">
                <input type="username" class="form-control form-control-md" id="floatingInput">
              </div>
              <div class="p-1">Password</div>
              <div class="form-floating mb-5">
                <input type="password" class="form-control form-control-md" id="floatingPassword">
              </div>
              <div class="p-1 d-flex justify-content-between">
                <small>Not Registered?</small>
                <small><a href="/register">Register</a></small>
              </div>
              {{-- <div>
                <main>
                    <label for="donthaveaccount">Don't have an account?</label>
                </main>
              </div> --}}

              <button class="w-100 btn btn-md btn-primary" type="login">Login</button>
            </form>
        </main>
    </div>
</div>
@endsection