@extends('layout')
@section('title', 'Contact Us')
@section('content')
<h3 class="text-center mb-3">Contact Us</h3>
<div class="flex d-flex justify-content-center mb-3">
  <form action="{{ route('contact.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Enter your name" required><br><br>
    <input type="email" name="email" placeholder="Enter your email" required><br><br>
    <textarea name="message" placeholder="Enter your message" required></textarea><br><br>
    <button type="submit" class="btn btn-primary">Send Message</button>
  </form>
@endsection