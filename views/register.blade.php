@extends('layout')
@section('title', 'Register')
@section( 'content')
<script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
<body>
<form action="{{ route('register.post') }}" method="POST" class="ms-auto me-auto mt-3" style="width: 300px">
    @csrf
  <div class="mb-3">
    <input type="text" class="form-control" name="name" placeholder="Enter your Name">
    <p id="nameError" style="color: red"></p>
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
    <div class="mb-3">
    <input type="email" class="form-control" name="email" placeholder="Enter your Email id">
        <p id="emailError" style="color: red"></p>
    @error('email')
        <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <input type="password" class="form-control" name="password" placeholder="Enter your password">
        <p id="passwordError" style="color: red"></p>
    @error('password')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
    <select name="role"  value="Register As:" class="form-control mb-3">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script src="{{ asset('js/validation.js') }}">
name.oninput = nameError.innerText = (/A-Za-z\s/.test(name.value)) ? '' : 'Name must contain only letters and spaces';  
email.oninput = emailError.innerText = (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) ? '' : 'Invalid email format';  
password.oninput = passwordError.innerText = (/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/.test(password.value)) ? '' : 'Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one number';
</script>
@endsection
</body>