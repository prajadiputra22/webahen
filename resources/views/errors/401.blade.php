@extends('errors.layout.errors')

@section('title', '404 Not Found')

@section('error-code')
<span>4</span>
<span class="accent">0</span>
<span>1</span>
@endsection

@section('message', 'Sorry, Page Not Found')

@section('description')
The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
@endsection