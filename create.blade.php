@extends('layout')
@section('title', 'Add Course')
@section('content')
<h3 class="text-center">Add Course</h3>
<div class="container">
    <form method="POST" action="{{ route('course.store') }}" class="mx-auto mt-4" style="max-width: 500px;">
        @csrf
        
        <div class="mb-3">
            <input type="text" name="title" class="form-control" placeholder="Enter the title">
        </div>

        <div class="mb-3">
            <textarea name="description" class="form-control" placeholder="Description"></textarea>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>
    </form>
</div>

@endsection