@extends('layout')
@section('title', 'Edit Course')
@section('content')
    <h2 class="text-center mb-3">Edit Course</h2>
<div class="container">
    <div class="mx-auto mt-4" style="max-width: 500px;">
    <form action="{{ route('course.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')
            <input type="text" name="title" value="{{ $course->title }}" class="form-control m-3" placeholder="Course Title" required>
            <textarea name="description" class="form-control m-3" placeholder="Course Description" required>{{ $course->description }}</textarea>
            <input type="text" name="duration" value="{{ $course->duration }}" class="form-control m-3" placeholder="Course Duration" required>
            <input type="text" name="instructor" value="{{ $course->instructor }}" class="form-control m-3" placeholder="Instructor Name" required>
            <input type="number" step="0.01" name="price" value="{{ $course->price }}" class="form-control m-3" placeholder="Course Price" required>
            <input type="text" name="category" value="{{ $course->category }}" class="form-control m-3" placeholder="Course Category" required>
            <input type="text" name="level" value="{{ $course->level }}" class="form-control m-3" placeholder="Course Level" required>
            <input type="text" name="syllabus" value="{{ $course->syllabus }}" class="form-control m-3" placeholder="Course Syllabus" required>
        <div class="text-center">
            <button type="submit" class="btn btn-dark m-3">Update</button>
        <button class="btn btn-dark m-3"><a href="{{ route('course.index') }}" class="text-white text-decoration-none">Back</a></button>
        </div>
    </form>
    </div>
</div>
@endsection