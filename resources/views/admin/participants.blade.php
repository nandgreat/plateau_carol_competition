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
                <input type="text" id="searchInput" placeholder="Search participants..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 w-full md:w-64">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
            <a href="{{ route('admin.participants.download-list-pdf') }}"
                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors"
                target="_blank">
                <i class="fas fa-file-pdf"></i>
                <span class="hidden md:inline">Download List PDF</span>
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6" id="statsCards">
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

<!-- Loading Spinner -->
<div id="loadingSpinner" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="animate-spin rounded-full h-16 w-16 border-b-2 border-green-600 mx-auto"></div>
        <p class="text-white text-center mt-4">Searching participants...</p>
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
            <tbody class="divide-y divide-gray-200" id="participantsTableBody">
                @include('admin.partials.participants-table-body', ['participants' => $participants])
            </tbody>
        </table>
    </div>

    <div id="noResults" class="hidden text-center py-12">
        <i class="fas fa-search text-gray-300 text-5xl mb-4"></i>
        <h3 class="text-lg font-medium text-gray-900 mb-1">No participants found</h3>
        <p class="text-gray-500 max-w-md mx-auto">No participants match your search criteria. Try different keywords.</p>
    </div>

    @if($participants->isEmpty())
    <div class="text-center py-12" id="emptyState">
        <i class="fas fa-users text-gray-300 text-5xl mb-4"></i>
        <h3 class="text-lg font-medium text-gray-900 mb-1">No participants found</h3>
        <p class="text-gray-500 max-w-md mx-auto">There are no registered participants yet. When participants register, they will appear here.</p>
    </div>
    @endif
</div>

<!-- Pagination -->
<div id="paginationSection" class="mt-6 flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
    @if($participants->hasPages())
    <div class="text-sm text-gray-700">
        Showing <span class="font-medium">{{ $participants->firstItem() }}</span> to
        <span class="font-medium">{{ $participants->lastItem() }}</span> of
        <span class="font-medium">{{ $participants->total() }}</span> participants
    </div>
    <div class="bg-white px-4 py-3 rounded-lg shadow-sm border border-gray-200">
        {{ $participants->links() }}
    </div>
    @endif
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
    let searchTimeout;

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

    // AJAX Search Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('participantsTableBody');
        const loadingSpinner = document.getElementById('loadingSpinner');
        const noResults = document.getElementById('noResults');
        const emptyState = document.getElementById('emptyState');
        const paginationSection = document.getElementById('paginationSection');
        const statsCards = document.getElementById('statsCards');

        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const searchTerm = this.value.trim();

            // Show loading spinner for searches with terms
            if (searchTerm.length > 0) {
                loadingSpinner.classList.remove('hidden');
            }

            searchTimeout = setTimeout(function() {
                performSearch(searchTerm);
            }, 500); // 500ms delay
        });

        function performSearch(searchTerm) {
            if (searchTerm.length === 0) {
                // If search is empty, reload the page to show all participants
                window.location.reload();
                return;
            }

            fetch('{{ route("admin.participants.search") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    search: searchTerm
                })
            })
            .then(response => response.json())
            .then(data => {
                loadingSpinner.classList.add('hidden');

                if (data.success) {
                    // Update table body
                    tableBody.innerHTML = data.html;

                    // Update stats cards
                    if (data.stats) {
                        updateStatsCards(data.stats);
                    }

                    // Show/hide no results message
                    if (data.participants.length === 0) {
                        noResults.classList.remove('hidden');
                        tableBody.classList.add('hidden');
                        paginationSection.classList.add('hidden');
                        if (emptyState) emptyState.classList.add('hidden');
                    } else {
                        noResults.classList.add('hidden');
                        tableBody.classList.remove('hidden');
                        // Hide pagination for search results
                        paginationSection.classList.add('hidden');
                        if (emptyState) emptyState.classList.add('hidden');
                    }
                } else {
                    console.error('Search failed:', data.message);
                    // Fallback: reload the page
                    window.location.reload();
                }
            })
            .catch(error => {
                console.error('Search error:', error);
                loadingSpinner.classList.add('hidden');
                // Fallback: reload the page on error
                window.location.reload();
            });
        }

        function updateStatsCards(stats) {
            const totalCard = statsCards.querySelector('.bg-white:nth-child(1) h3');
            const maleCard = statsCards.querySelector('.bg-white:nth-child(2) h3');
            const femaleCard = statsCards.querySelector('.bg-white:nth-child(3) h3');
            const ageCard = statsCards.querySelector('.bg-white:nth-child(4) h3');

            if (totalCard) totalCard.textContent = stats.total;
            if (maleCard) maleCard.textContent = stats.maleCount;
            if (femaleCard) femaleCard.textContent = stats.femaleCount;
            if (ageCard) ageCard.textContent = stats.averageAge;
        }

        // Allow pressing Enter to search immediately
        searchInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                clearTimeout(searchTimeout);
                performSearch(this.value.trim());
            }
        });
    });
</script>
@endsection