@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-registration w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal">Noted.</h1>
            <form action="/register" method="post">
                @csrf
                <div class="form-floating">
                    <label for="namalengkap">Nama Lengkap</label>
                    <input type="text" name="namalengkap" class="form-control rounded-top @error('namalengkap') is-invalid @enderror" id="namalengkap" placeholder="Nama Lengkap" required value="{{ old('namalengkap') }}">
                    @error('namalengkap')
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <label for="username">Username</label>
                    <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" required value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <small class="d-block text-center mt-3">Have an account? <a href="/login">Login</a></small>
                <button class="w-100 btn btn-lg btn-primary" type="register">Register</button>
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
