@extends('layout')
@section('title', 'Add Course')
@section('content')
<h3 class="text-center">Add Course</h3>
<div class="text-end">
<button onclick="history.back()" class="btn btn-secondary mb-3">Back</button>
</div>
<div class="container">
    <form method="POST" action="{{ route('course.store') }}" class="mx-auto mt-4" style="max-width: 500px;">
        @csrf
        
        <div class="mb-3">
            <input type="text" name="title" class="form-control" placeholder="Enter the title">
        </div>

        <div class="mb-3">
            <textarea name="description" class="form-control" placeholder="Description"></textarea>
        </div>
        <div class="mb-3">
            <input type="text" name="duration" class="form-control" placeholder="Duration">
        </div>
        <div class="mb-3">
<select name="instructor_name" class="form-control">
                <option value="" disabled selected>Select Instructor</option>
                @foreach($instructors as $instructor)
                    <option value="{{ $instructor->name }}">{{ $instructor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <input type="number" step="0.01" name="price" class="form-control" placeholder="Price"> 
        </div>
        <div class="mb-3">
<select name="category" class="form-control">
                <option value="" disabled selected>Select Category</option>
                <option value="Programming">Programming</option>
                <option value="Design">Design</option>
                <option value="Marketing">Marketing</option>
                <option value="Business">Business</option>
            </select>
        </div>
        <div class="mb-3">
<select name="level" class="form-control">
                <option value="" disabled selected>Select Level</option>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
            </select>
            </div>
        <div class="mb-3">
            <input type="text" name="syllabus" class="form-control" placeholder="Syllabus">
        </div>
        <div class="text-center m-3">
            <button type="submit" class="btn btn-dark">Submit</button>
       
            <button type="reset" class="btn btn-dark">Clear</button>
        </div>
    </form>
</div>

@endsection