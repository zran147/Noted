@extends('layouts.main')
<link rel="stylesheet" href="css/login.css">

@section('after')
<div class="col-2 col-sm-4 col-md-6 col-lg-7" id="brown"></div>
@endsection

@section('container')
<div class="row justify-content-center">
    <div class="col-10 col-sm-8 col-md-8 col-lg-7">
        <main class="form-registration w-100 m-auto text-center">
            <h1 class="display-5 mb-4 fw-normal" id="noted">Noted.</h1>
            <form class="text-start poppins brown" action="/register" method="post">
                @csrf
                <div class="p-1">Nama Lengkap</div>
                <div class="form-floating mb-1">
                    <input type="text" name="namalengkap" class="form-control form-control-sm rounded-top @error('namalengkap') is-invalid @enderror" id="namalengkap" required value="{{ old('namalengkap') }}">
                    @error('namalengkap')
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                    @enderror
                </div>
                <div class="p-1">Username</div>
                <div class="form-floating mb-1">
                    <input type="username" name="username" class="form-control form-control-sm @error('username') is-invalid @enderror" id="username" required value="{{ old('username') }}">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="p-1">Email</div>
                <div class="form-floating mb-1">
                    <input type="email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" required value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="p-1">Password</div>
                <div class="form-floating mb-4">
                    <input type="password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="floatingPassword">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
              <div class="p-1 d-flex justify-content-between">
                <small>Have an account?</small>
                <small><a href="/login">Login</a></small>
              </div>
                <button class="w-100 btn btn-sm btn-primary" type="register">Register</button>
            </form>
        </main>
    </div>
</div>
@endsection

{{-- @extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-registration w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal">Noted.</h1>
            <form action="/register" method="post">
                @csrf
                <div class="form-floating">
                    <label for="namalengkap"> Nama Lengkap</label>
                    <input type="text" name="namalengkap" class="form-control rounded-top @error('name')is-invalid @enderror" id="namalengkap" placeholder="Nama Lengkap">
                    @error('namalengkap')
                    <div class="invalid-feedback">
                        Please choose a username.
                      </div>
                    @enderror
                  </div>
              <div class="form-floating">
                <label for="username">Username</label>
                <input type="username" name="username" class="form-control" id="username" placeholder="Username">
              </div>
              <div class="form-floating">
                <label for="email">Email</label>
                <input type="email" name ="email" class="form-control" id="email" placeholder="Email">
              </div>
              <div class="form-floatin g">
                <label for="password">Password</label>
                <input type="password" name="password"class="form-control" id="floatingPassword" placeholder="Password">
              </div>
              <small class="d-block text-center mt-3"> Have an account? <a href="/login"> Login</a>
              </small>

              <button class="w-100 btn btn-lg btn-primary" type="register">Register</button>
            </form>
        </main>
    </div>
</div>



@endsection --}}
