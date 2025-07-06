@extends('layouts.FrontendLayout')
@section('contentEmail')
@section('title', 'get email')
<div class="text-center d-flex justify-content-center my-4">
<div class="card p-3 bg-light col-lg-6">
  <h2 class="">Provide Your Email</h2>
    <form action="{{ route('customer.email.submit') }}" method="POST">
        @csrf
        <p>Hello, {{ $fbUser['name'] }} 👋</p>
        <input class="form-control" type="email" name="email" required placeholder="Enter your email">
        <button class="btn btn-primary mt-2" type="submit">Continue</button>
    </form>
</div>
</div>
@endsection