@extends('layout')
@section('title', 'Mentors')
@section('content')
<h3 class="text-center mb-4">Mentors</h3>
@if(Auth::check() && strtolower(Auth::user()->role) === 'admin')
    <div class="text-center mb-4">
        <a href="{{ route('mentor.create') }}" class="btn btn-dark">Add Mentor</a>
    </div>
@endif
<div class="container">
    @foreach($mentors as $mentor)
        <div class="row mb-4">
            <div class="col-12 d-flex 
                @if($loop->index % 3 == 0) justify-content-start
                @elseif($loop->index % 3 == 1) justify-content-center
                @else justify-content-end
                @endif">
                
                <div class="card shadow card-custom
                    @if($loop->index % 3 == 1) mt-n4
                    @elseif($loop->index % 3 == 2) mt-n4
                    @endif" 
                    style="width: 18rem;">
                    
                    <img src="{{ asset('storage/'. $mentor->image) }}" alt="Mentor Image" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text"><strong>Name:</strong> {{ $mentor->name }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $mentor->email }}</p>
                        <p class="card-text"><strong>Expertise:</strong> {{ $mentor->expertise }}</p>

                        @if(Auth::check() && strtolower(Auth::user()->role) === 'admin')
                            <a href="{{ route('mentor.edit', $mentor) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('mentor.destroy', $mentor) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
