@extends('layouts.main')
@include('partials.navbar')

@section('container')
    <div class="row card mt-5 poppins ">
        <form method="post" action="/home/notes">
            @csrf
            @include('home.notes._form')
        </form>
    </div>
@endsection

<!-- <div class="container-fluid px-0">
  <h6>
    <a href="/notes">Back to notes</a>
</h6>
    <div class="row g-0">
        First column
        <div class="col vh-100">
        </div> -->


<script>
    const title = document.querySelector('#judul_note');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/home/notes/checkSlug?judul_note=' + judul_note.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>