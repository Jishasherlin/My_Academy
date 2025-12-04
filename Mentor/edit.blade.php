@extends('layout')
@section('title', 'Edit Mentor')
@section('content')
<h3 class="text-center">Edit Mentor</h3>
<div class="container">
    <form method="POST" action="{{ route('mentor.update', $mentor) }}" class="mx-auto mt-4" style="max-width: 500px;">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <input type="file" name="image" class="form-control" value="{{ $mentor->image }}"> 
        </div>
        
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $mentor->name }}">
        </div>

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $mentor->email }}">
        </div>

        <div class="mb-3">
            <input type="text" name="expertise" class="form-control" placeholder="Enter Expertise" value="{{ $mentor->expertise }}">
        </div>

        <div class="text-center mb-3">
            <button type="submit" class="btn btn-dark">Update</button>
        </div>
    <div class="text-center">
        <button class="btn btn-dark m-3"><a href="{{ route('mentor.index') }}" class="text-white text-decoration-none">Back</a></button>
    </div>  
     </form>
</div>
@endsection
