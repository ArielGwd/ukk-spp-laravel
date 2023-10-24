
@extends('layout.layout')

@section('content')
<div class="text-center">
    <div class="error mx-auto" data-text="403">403</div>
    {{-- <div class="error mx-auto" data-text="404">404</div> --}}
    <p class="lead text-gray-800 mb-5">You don’t have permission to access</p>
    {{-- <p class="lead text-gray-800 mb-5">Page Not Found</p> --}}
    <p class="text-gray-500 mb-0"><b>Maaf</b> anda tidak bisa mengakses link atau halaman tersebut</p>
    <a href="{{ url('/') }}">&larr; Back to Dashboard</a>
</div>
@endsection