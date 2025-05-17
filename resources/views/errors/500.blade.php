@extends('errors.layout.errors')

@section('title', '500 Server Error')

@section('error-code')
<span>5</span>
<span class="accent">0</span>
<span>0</span>
@endsection

@section('message', 'Server Error')

@section('description')
Oops! Something went wrong on our server. We're working to fix the issue.
@endsection