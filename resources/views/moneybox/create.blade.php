@extends('layouts.main')
@include('partials.navbar')

<div class="container-fluid px-0">
  <h6>
    <a href="/moneybox">Back to MoneyBox</a>
  </h6>
  <div class="row g-0">
    <!-- First column -->
    <div class="col-lg-6 vh-100">
      <form method="post" action="{{ url('/moneybox') }}">
      {{-- <form method="post" action="{{ route('moneybox.store')}}"> --}}
        @csrf
        @include('moneybox._form')
      </form>
    </div>
  </div>
</div>

<script>
const judulMoneybox = document.querySelector('#judul_moneybox');
const slug = document.querySelector('#slug');

judulMoneybox.addEventListener('input', function() {
  const title = judulMoneybox.value.trim().toLowerCase().replace(/[^a-z0-9-]+/g, '-');
  slug.value = title;
});

  </script>
  
