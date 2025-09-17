@extends('layout')
@section('title', 'Courses')
@section('content')
<h3  class="text-center">All Courses</h3>
@if(Auth::check() && strtolower(Auth::user()->role) === 'admin')
<div class="d-flex justify-content-end">
<a href="{{ route('course.create', '$course') }}" class="btn btn-dark m-3">Add Course</a>
</div>
@endif

<table class="table table-bordered">
    <thead class="text-center table-dark">
        <tr>
            <th>S.No</th>
            <th>Title</th>
            <th>Description</th>
@if(Auth::check() && strtolower(Auth::user()->role) === 'admin')
            <th>Duration</th>
            <th>Instructor</th>
            <th>Price</th>
            <th>Category</th>
            <th>Level</th>
            <th>Syllabus</th>
            @endif
          <th>Actions</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $course -> id }} </td>
            <td>{{ $course -> title }} </td>
            <td>{{ $course -> description }} </td>
            @if(Auth::check() && strtolower(Auth::user()->role) === 'admin')
            <td>{{ $course-> duration }} </td>
            <td>{{ $course-> instructor }} </td>
            <td>{{ $course-> price }} </td>
            <td>{{ $course-> category }} </td>
            <td>{{ $course-> level }} </td>
            <td>{{ $course-> syllabus }} </td>
            @endif
                        <td>
                            @if(Auth::check() && strtolower(Auth::user()->role) === 'admin')
                            <a href="{{ route('course.edit', $course) }}"><i class="bi bi-pencil-square" aria-label="Edit"></i></a>
                            <form action="{{ route('course.destroy', $course) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this course?')"><i class="bi bi-trash" aria-label="Delete"></i></button>
                            </form>
                             @endif
                             <a href="{{ route('course.show', $course) }}" class="bi bi-eye" aria-label="View"></a>
                        </td>
                   
        </tr>
        @endforeach
    </tbody>
</table>
@endsection