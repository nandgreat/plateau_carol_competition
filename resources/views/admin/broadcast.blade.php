@extends('layouts.admin-layout')

@section('content')
<h1 class="text-2xl font-bold text-green-900 mb-4">Broadcast Email</h1>

<form action="{{ route('portal.broadcast.send') }}" method="POST" class="bg-white p-6 rounded-lg shadow max-w-2xl">
    @csrf
    <div class="mb-4">
        <label class="block mb-1 text-gray-700 font-medium">Subject</label>
        <input type="text" name="subject" required class="w-full border-gray-300 rounded p-2 focus:ring-green-700 focus:border-green-700">
    </div>

    <div class="mb-4">
        <label class="block mb-1 text-gray-700 font-medium">Message</label>
        <textarea name="message" rows="6" required class="w-full border-gray-300 rounded p-2 focus:ring-green-700 focus:border-green-700"></textarea>
    </div>

    <button type="submit" class="bg-green-800 text-white px-4 py-2 rounded hover:bg-green-700">
        Send Broadcast
    </button>
</form>
@endsection
