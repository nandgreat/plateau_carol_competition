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
            <a href="{{ route('admin.participants.download-pdf', $child->id) }}"
                class="bg-blue-600 hover:bg-blue-800 p-2 rounded-lg hover:bg-blue-50 transition-colors text-white"
                title="Download PDF"
                target="_blank">
                <i class="fas fa-file-pdf"></i>
                <span class="hidden md:inline">Download</span>
            </a>
        </div>
    </td>
</tr>
@endforeach