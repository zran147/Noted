@extends('layouts.main')
@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal">Noted.</h1>
            <form action="{{ route('login') }}" method="post">
              @csrf
              <div class="form-floating">
                <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="Username" autofocus required value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
              </div> 
              <small class="d-block text-center mt-3"> Not Registered? <a href="/register"> Register Now</a>
              </small>
              <button class="w-100 btn btn-lg btn-primary" type="login">Login</button>
            </form>
        </main>
    </div>
</div>
@endsection