@extends('layout')
@section('title', 'Add Mentor')
@section('content')
<h3 class="text-center">Add Mentor</h3>
<div class="text-end">
<button onclick="history.back()" class="btn btn-secondary mb-3">Back</button>
</div>
<div class="container">
    <form method="POST" action="{{ route('mentor.store') }}" enctype="multipart/form-data" class="mx-auto mt-4" style="max-width: 500px;">
        @csrf

        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
        </div>

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Enter Email">
        </div>

        <div class="mb-3">
            <input type="text" name="expertise" class="form-control" placeholder="Enter Expertise">
        </div>

         <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" name="image" class="form-control" accept="image/*"> 
        </div>

        <div class="text-center m-3">
            <button type="submit" class="btn btn-dark">Submit</button>
            <button type="reset" class="btn btn-dark">Clear</button>
        </div>
    </form>
</div>
@endsection
