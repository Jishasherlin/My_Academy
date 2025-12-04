@extends('layout')
@section('title', 'Admin Dashboard')
@section('content')
    <h1 class="text-center">Welcome Admin!</h1>
    <h2>All Enquiries</h2>

<table class="table table-bordered" cellpadding="10">
    <thead class="text-center table-dark">
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Email</th>  
        <th>Course</th>
        <th>Date</th>
    </tr>
</thead>
<tbody class="text-center">
    @foreach($enquiries as $enquiry)
    <tr>
        <td>{{ $enquiry->id }}</td>
        <td>{{ $enquiry->user->name }}</td>
        <td>{{ $enquiry->user->email }}</td>
        <td>{{ $enquiry->course->title }}</td>
        <td>{{ $enquiry->created_at->format('d M Y') }}</td>
          </tr>
    @endforeach
    </tbody>
</table>
@endsection
