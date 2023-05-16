@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal">Noted.</h1>
            <form>
              <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="Username">
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
              </div>
              <div>
                <main>
                    <label for="donthaveaccount">Don't have an account?</label>
                </main>
              </div>

              <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>            </form>
        </main>
    </div>
</div>



@endsection