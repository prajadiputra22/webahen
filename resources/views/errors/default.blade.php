<!-- resources/views/errors/default.blade.php -->
@extends('errors.layout.errors')

@section('title', 'Error')

@section('error-code')
{{ substr(request()->route('statusCode') ?? '000', 0, 1) }}<span class="accent">{{ substr(request()->route('statusCode') ?? '000', 1, 1) }}</span>{{ substr(request()->route('statusCode') ?? '000', 2, 1) }}
@endsection

@section('message')
{{ $message ?? 'Error Occurred' }}
@endsection

@section('description')
{{ $description ?? 'An unexpected error has occurred. Please try again later.' }}
@endsection