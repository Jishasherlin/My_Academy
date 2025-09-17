@extends('layout')
@section('title', 'Register')
@section( 'content')

<form action="{{ route('register.post') }}" method="POST" class="ms-auto me-auto mt-3" style="width: 300px">
    @csrf
  <div class="mb-3">
    <input type="text" class="form-control" name="name" placeholder="Enter your Name">
  </div>
    <div class="mb-3">
    <input type="email" class="form-control" name="email" placeholder="Enter your Email id">
  </div>
  <div class="mb-3">
    <input type="password" class="form-control" name="password" placeholder="Enter the password">

      </div>
    <select name="role"  value="Register As:" class="form-control mb-3">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection