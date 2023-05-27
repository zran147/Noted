@extends('layouts.main')
@include('partials.navbar')

<div class="container-fluid px-0">
  <h6>
    <a href="/transactions">Back to transactions</a>
  </h6>
  <div class="row g-0">
    <!-- First column -->
    <div class="col-lg-6 vh-100">
      <form method="post" action="{{ route('transaksi.store') }}">
        @csrf
        @include('transaksi._form')
      </form>
    </div>
  </div>
</div>

<script>
const judulTransaksi = document.querySelector('#judul_transaksi');
const slug = document.querySelector('#slug');

judulTransaksi.addEventListener('input', function() {
  const title = judulTransaksi.value.trim().toLowerCase().replace(/[^a-z0-9-]+/g, '-');
  slug.value = title;
});

  </script>
  
