@extends('layout')
@section('title', 'Course Details')
@section(section: 'content')
<h3 class="text-center">{{ $course->title }}</h3>
<p>{{ $course->description }}</p>
<div class="mb-3">
        <h5>Duration: {{ $course->duration }} hours</h5>
        <h5>Instructor: {{ $course->instructor }}</h5>
        <h5>Price: ${{ $course->price }}</h5>
        <h5>Category: {{ $course->category }}</h5>
        <h5>Level: {{ $course->level }}</h5>
        <h5>Syllabus: {{ $course->syllabus }}</h5>
    </div>
    <a href="{{ route('course.enroll', $course->id) }}" class="btn btn-primary">Enroll Now</a>
@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif
    <a href="{{ route('course.index') }}" class="btn btn-secondary">Back to Courses</a>
@endsection