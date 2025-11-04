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
                <h3 class="text-2xl font-bold text-gray-800">{{ $participants->where('gender', 'male')->count() }}</h3>
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
                <h3 class="text-2xl font-bold text-gray-800">{{ $participants->where('gender', 'female')->count() }}</h3>
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
                                <img src="{{ asset($child->child_image_path) }}" alt="{{ $child->fullname }}" class="h-10 w-10 rounded-full object-cover border border-gray-300">
                            </div>
                            <div>
                                <div class="font-medium text-gray-900">{{ $child->fullname }}</div>
                                <div class="text-xs text-gray-500 truncate max-w-xs">{{ $child->email ?? 'No email' }}</div>
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
                        <div class="font-medium text-gray-900">{{ $child->parent_name }}</div>
                        <div class="text-xs text-gray-500">{{ $child->parent_phone ?? 'No phone' }}</div>
                    </td>
                    <td class="py-4 px-4">
                        <span class="text-gray-700">{{ $child->lga ?? 'Not specified' }}</span>
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex justify-center space-x-2">
                            <button 
                                @click="openModal = true; selected = {{ json_encode($child) }}" 
                                class="text-green-700 hover:text-green-900 p-2 rounded-lg hover:bg-green-50 transition-colors"
                                title="View Details">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button 
                                onclick="confirmDelete('2')" 
                                class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50 transition-colors"
                                title="Delete Participant">
                                <i class="fas fa-trash-alt"></i>
                            </button>
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

<!-- View Modal -->
<div x-data="{
    openModal: false,
    selected: {},
    closeModal() {
        this.openModal = false;
        this.selected = {};
    }
}" x-cloak>
    <div x-show="openModal" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div x-show="openModal" 
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" 
                 aria-hidden="true"
                 @click="closeModal()"></div>

            <!-- Modal panel -->
            <div x-show="openModal"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-user text-green-600"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title" x-text="selected.fullname || 'Participant Details'"></h3>
                            <div class="mt-4">
                                <div class="flex flex-col items-center mb-6">
                                    <img :src="selected.child_image_path" :alt="selected.fullname" class="h-32 w-32 rounded-full object-cover border-4 border-green-100 shadow-sm">
                                </div>
                                
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="flex justify-between border-b pb-2">
                                        <span class="font-medium text-gray-500">Full Name:</span>
                                        <span class="text-gray-900" x-text="selected.fullname"></span>
                                    </div>
                                    <div class="flex justify-between border-b pb-2">
                                        <span class="font-medium text-gray-500">Age:</span>
                                        <span class="text-gray-900" x-text="selected.age + ' years'"></span>
                                    </div>
                                    <div class="flex justify-between border-b pb-2">
                                        <span class="font-medium text-gray-500">Gender:</span>
                                        <span class="text-gray-900 capitalize" x-text="selected.gender"></span>
                                    </div>
                                    <div class="flex justify-between border-b pb-2">
                                        <span class="font-medium text-gray-500">Parent/Guardian:</span>
                                        <span class="text-gray-900" x-text="selected.parent_name"></span>
                                    </div>
                                    <div class="flex justify-between border-b pb-2">
                                        <span class="font-medium text-gray-500">LGA:</span>
                                        <span class="text-gray-900" x-text="selected.lga || 'Not specified'"></span>
                                    </div>
                                    <div class="flex justify-between border-b pb-2" x-show="selected.email">
                                        <span class="font-medium text-gray-500">Email:</span>
                                        <span class="text-gray-900" x-text="selected.email"></span>
                                    </div>
                                    <div class="flex justify-between border-b pb-2" x-show="selected.parent_phone">
                                        <span class="font-medium text-gray-500">Parent Phone:</span>
                                        <span class="text-gray-900" x-text="selected.parent_phone"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" 
                            @click="closeModal()" 
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-700 text-base font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

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

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection