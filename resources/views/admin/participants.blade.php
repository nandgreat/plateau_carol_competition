@extends('layouts.admin-layout')

@section('content')
<div class="mb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-green-900 mb-2">Registered Participants</h1>
            <p class="text-gray-600">Manage and view all registered participants for the event</p>
        </div>
        <div class="mt-4 md:mt-0 flex items-center space-x-3">
            <div class="relative">
                <input type="text" placeholder="Search participants..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 w-full md:w-64">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
            <button class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
                <i class="fas fa-download"></i>
                <span class="hidden md:inline">Export</span>
            </button>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <div class="flex items-center">
            <div class="h-12 w-12 rounded-lg bg-green-100 flex items-center justify-center mr-4">
                <i class="fas fa-users text-green-600"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Total Participants</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $participants->total() }}</h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <div class="flex items-center">
            <div class="h-12 w-12 rounded-lg bg-blue-100 flex items-center justify-center mr-4">
                <i class="fas fa-male text-blue-600"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Male</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $maleCount }}</h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <div class="flex items-center">
            <div class="h-12 w-12 rounded-lg bg-pink-100 flex items-center justify-center mr-4">
                <i class="fas fa-female text-pink-600"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Female</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $femaleCount }}</h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <div class="flex items-center">
            <div class="h-12 w-12 rounded-lg bg-purple-100 flex items-center justify-center mr-4">
                <i class="fas fa-child text-purple-600"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Avg. Age</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ number_format($participants->avg('age'), 1) }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- Participants Table -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gradient-to-r from-green-800 to-green-700 text-white">
                <tr>
                    <th class="py-4 px-4 text-left font-semibold text-sm uppercase tracking-wider">
                        <div class="flex items-center">
                            <span>Participant</span>
                        </div>
                    </th>
                    <th class="py-4 px-4 text-left font-semibold text-sm uppercase tracking-wider">Age</th>
                    <th class="py-4 px-4 text-left font-semibold text-sm uppercase tracking-wider">Gender</th>
                    <th class="py-4 px-4 text-left font-semibold text-sm uppercase tracking-wider">Organization</th>
                    <th class="py-4 px-4 text-left font-semibold text-sm uppercase tracking-wider">Parent/Guardian</th>
                    <th class="py-4 px-4 text-left font-semibold text-sm uppercase tracking-wider">LGA</th>
                    <th class="py-4 px-4 text-center font-semibold text-sm uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($participants as $child)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-4">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0 mr-3">
                                <img src="{{ asset($child->child_image_path) }}" alt="{{ $child->fullname }}"
                                    class="h-10 w-10 rounded-full object-cover border border-gray-300"
                                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($child->fullname) }}&background=random'">
                            </div>
                            <div>
                                <div class="font-medium text-gray-900">{{ $child->fullname }}</div>
                                <div class="text-xs text-gray-500 truncate max-w-xs">{{ $child->unique_code }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $child->age }} years
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        @if(strtolower($child->gender) == 'male')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            <i class="fas fa-mars mr-1"></i> Male
                        </span>
                        @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800">
                            <i class="fas fa-venus mr-1"></i> Female
                        </span>
                        @endif
                    </td>
                    <td class="py-4 px-4">
                        <span class="text-gray-700">{{ $child->organization ?? 'Not specified' }}</span>
                    </td>
                    <td class="py-4 px-4">
                        <div class="font-medium text-gray-900">{{ $child->parent_name }}</div>
                        <div class="text-xs text-gray-500">{{ $child->parent_phone ?? 'No phone' }}</div>
                    </td>
                    <td class="py-4 px-4">
                        <span class="text-gray-700">{{ $child->lga ?? 'Not specified' }}</span>
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex justify-center space-x-2">
                          
                            <a href="{{ route('admin.participants.details', $child->id) }}" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
                                <i class="fas fa-eye"></i>
                                <span class="hidden md:inline">View</span>
                            </a>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($participants->isEmpty())
    <div class="text-center py-12">
        <i class="fas fa-users text-gray-300 text-5xl mb-4"></i>
        <h3 class="text-lg font-medium text-gray-900 mb-1">No participants found</h3>
        <p class="text-gray-500 max-w-md mx-auto">There are no registered participants yet. When participants register, they will appear here.</p>
    </div>
    @endif
</div>

<!-- Pagination -->
@if($participants->hasPages())
<div class="mt-6 flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
    <div class="text-sm text-gray-700">
        Showing <span class="font-medium">{{ $participants->firstItem() }}</span> to
        <span class="font-medium">{{ $participants->lastItem() }}</span> of
        <span class="font-medium">{{ $participants->total() }}</span> participants
    </div>
    <div class="bg-white px-4 py-3 rounded-lg shadow-sm border border-gray-200">
        {{ $participants->links() }}
    </div>
</div>
@endif

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                <i class="fas fa-exclamation-triangle text-red-600"></i>
            </div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 mt-2">Delete Participant</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">
                    Are you sure you want to delete this participant? This action cannot be undone.
                </p>
            </div>
            <div class="items-center px-4 py-3">
                <button id="deleteConfirm" class="px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300 transition-colors">
                    Yes, Delete
                </button>
                <button id="deleteCancel" class="mt-2 px-4 py-2 bg-gray-300 text-gray-800 text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let deleteUrl = '';

    function confirmDelete(url) {
        deleteUrl = url;
        const modal = document.getElementById('deleteModal');
        modal.classList.remove('hidden');

        document.getElementById('deleteConfirm').onclick = function() {
            window.location.href = deleteUrl;
        };

        document.getElementById('deleteCancel').onclick = function() {
            modal.classList.add('hidden');
        };

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        };
    }

    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    });
</script>
@endsection