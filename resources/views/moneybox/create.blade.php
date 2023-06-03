@extends('layouts.main')
@include('partials.navbar')

@section('container')
  <div class="row mt-5">
    <div class="col-6">
      <!-- Add your chart/graph component here -->
    </div>
    
    <div class="col-6">
      <div class="card poppins text-capitalize">
        <form method="post" action="{{ url('/moneybox') }}">
          @csrf
          @include('moneybox._form')
        </form>
      </div>
    </div>
  </div>
@endsection

<script>
const judulMoneybox = document.querySelector('#judul_moneybox');
const slug = document.querySelector('#slug');

judulMoneybox.addEventListener('input', function() {
  const title = judulMoneybox.value.trim().toLowerCase().replace(/[^a-z0-9-]+/g, '-');
  slug.value = title;
});

  </script>
  
