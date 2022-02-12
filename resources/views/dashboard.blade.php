<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <h2 class="flex-center font-bold text-black text-5xl pt-6">Welcome New Successor</h2>
</div>

<div class="flex items-center justify-center px-5 py-5">
    <video width="1440" height="1080" controls>
        <source src="video/Trailer.mp4" type="video/mp4">
    </video>
</div>



@endsection
