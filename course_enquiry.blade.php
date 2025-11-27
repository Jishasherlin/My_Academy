@extends('layout')
@section('title', 'Enquiry Received')
@section('content')
<h3>New Course Enrollment</h3>
<p>User <strong>{{ $user->name }}</strong> has enrolled in <strong>{{ $course->name }}</strong>.</p>
<p>Email: {{ $user->email }}</p>
@endsection