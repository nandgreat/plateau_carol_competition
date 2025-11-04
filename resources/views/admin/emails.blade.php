@extends('layouts.admin-layout')

@section('content')
<h3 class="mb-4">Broadcast Email to Parents</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('admin.broadcast.send') }}">
    @csrf
    <div class="mb-3">
        <label>Subject</label>
        <input type="text" name="subject" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Message</label>
        <textarea name="message" class="form-control" rows="6" required></textarea>
    </div>
    <button class="btn btn-success">Send Email</button>
</form>
@endsection
