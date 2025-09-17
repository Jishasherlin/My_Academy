@extends('layout')
@section('title', 'Login')
@section('content')
    <form action="{{ route('login.post') }}" method="POST" class="ms-auto me-auto mt-5" style="width: 300px">
        @csrf
        <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="Enter your Email id">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Enter the password">
        </div>
        <div class="mb-5">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
