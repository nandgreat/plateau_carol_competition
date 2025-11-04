@extends('layouts.admin-layout')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-green-900 mb-2">Dashboard Overview</h1>
    <p class="text-gray-600">Monitor your platform's key metrics and activities</p>
</div>
 
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 mb-8">
    <div class="bg-gradient-to-r from-green-50 to-green-100 p-5 rounded-xl shadow-sm border border-green-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Total Registered Participants</p>
                <h2 class="text-3xl font-bold text-green-800 mt-1">{{ $totalParticipants }}</h2>
            </div>
            <div class="h-12 w-12 rounded-full bg-green-200 flex items-center justify-center">
                <i class="fas fa-users text-green-700"></i>
            </div>
        </div>
        <div class="mt-3 text-xs text-green-600 flex items-center">
            <i class="fas fa-arrow-up mr-1"></i> 12% increase from last month
        </div>
    </div>

    <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-5 rounded-xl shadow-sm border border-blue-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Emails Sent</p>
                <h2 class="text-3xl font-bold text-blue-800 mt-1">0</h2>
            </div>
            <div class="h-12 w-12 rounded-full bg-blue-200 flex items-center justify-center">
                <i class="fas fa-envelope text-blue-700"></i>
            </div>
        </div>
        <div class="mt-3 text-xs text-blue-600 flex items-center">
            <i class="fas fa-arrow-up mr-1"></i> 8% increase from last week
        </div>
    </div>

    <div class="bg-gradient-to-r from-purple-50 to-purple-100 p-5 rounded-xl shadow-sm border border-purple-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Upcoming Events</p>
                <h2 class="text-xl font-bold text-purple-800 mt-1">8th - 9th Nov 2025</h2>
            </div>
            <div class="h-12 w-12 rounded-full bg-purple-200 flex items-center justify-center">
                <i class="fas fa-calendar-alt text-purple-700"></i>
            </div>
        </div>
        <div class="mt-3 text-xs text-purple-600">
            <i class="fas fa-clock mr-1"></i> 45 days remaining
        </div>
    </div>
</div>

<!-- Recent Activity Section -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Activity</h3>
    <div class="space-y-4">
        <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
            <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                <i class="fas fa-user-plus text-green-600 text-sm"></i>
            </div>
            <div>
                <p class="text-sm font-medium">New participant registered</p>
                <p class="text-xs text-gray-500">John Doe joined the event 2 hours ago</p>
            </div>
        </div>
        
        <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
            <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                <i class="fas fa-envelope text-blue-600 text-sm"></i>
            </div>
            <div>
                <p class="text-sm font-medium">Broadcast sent</p>
                <p class="text-xs text-gray-500">Event reminder sent to all participants</p>
            </div>
        </div>
        
        <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
            <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center flex-shrink-0">
                <i class="fas fa-edit text-purple-600 text-sm"></i>
            </div>
            <div>
                <p class="text-sm font-medium">Event details updated</p>
                <p class="text-xs text-gray-500">Venue information was modified</p>
            </div>
        </div>
    </div>
</div>
@endsection