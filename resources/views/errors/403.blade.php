@extends('layouts.BackendLayout')

@section('title', '403 Unauthorized')

@section('page403')
    <div class="container text-center mt-5">
        <h1 class="display-1 text-danger">403</h1>
        <h2 class="mb-3">Unauthorized Access</h2>
        <p class="text-muted">You don't have permission to view this page.</p>
        <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Go Back</a>
    </div>
@endsection
