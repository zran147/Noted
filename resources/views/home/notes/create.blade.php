@extends('layouts.main')
@include('partials.navbar')

<div class="container-fluid px-0">
  <h6>
    <a href="/notes">Back to notes</a>
</h6>
    <div class="row g-0">
        <!-- First column -->
        <div class="col-lg-6 vh-100">
            <form method="post" action="/home/notes">
                @csrf
                @include('home.notes._form')
              </form>
        </div>


<script>
    const title = document.querySelector('#judul_note');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/home/notes/checkSlug?judul_note=' + judul_note.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>