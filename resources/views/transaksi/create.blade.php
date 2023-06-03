@extends('layouts.main')
@include('partials.navbar')

@section('container')
  <div class="row mt-5">
    <div class="col-6">
        <!-- Add your chart/graph component here -->
    </div>

    <div class="col-6">
        <div class="card poppins text-capitalize">
          <form method="post" action="{{ route('transaksi.store') }}">
            @csrf
            @include('transaksi._form')
          </form>
      </div>
    </div>
  </div>
@endsection

<script>
const judulTransaksi = document.querySelector('#judul_transaksi');
const slug = document.querySelector('#slug');

judulTransaksi.addEventListener('input', function() {
  const title = judulTransaksi.value.trim().toLowerCase().replace(/[^a-z0-9-]+/g, '-');
  slug.value = title;
});

  </script>
  
