@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Login</h1>
    @if (session('success'))
        <div class="alert alert-info mt-2" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('user.login.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection
