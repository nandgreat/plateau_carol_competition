<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-green-900 via-green-500 to-red-800 p-4 sm:p-6">
        <div class="bg-white w-full sm:max-w-3xl lg:max-w-4xl rounded-2xl shadow-xl p-4 sm:p-8 space-y-6 relative overflow-y-auto">
            
            {{-- Toast Notifications --}}
            @if ($errors->any())
                <div x-data="{ show: true }"
                    x-show="show"
                    x-init="setTimeout(() => show = false, 5000)"
                    class="fixed top-5 right-5 bg-red-500 text-white px-4 py-3 rounded-lg shadow-lg z-50 text-sm sm:text-base">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div x-data="{ show: true }"
                    x-show="show"
                    x-init="setTimeout(() => show = false, 5000)"
                    class="fixed top-5 right-5 bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg z-50 text-sm sm:text-base">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Header --}}
            <div class="text-center space-y-2">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="mx-auto h-16 w-auto sm:h-20">
                <h2 class="mt-2 text-lg sm:text-2xl font-bold text-gray-800 leading-tight">
                    2025 CHRISTMAS CAROL CHILDREN BIBLE QUIZ & RECITATION COMPETITION
                </h2>
                <p class="text-gray-500 text-sm sm:text-base">Children Registration Form</p>
            </div>

            {{-- Registration Form --}}
            <form method="POST" action="{{ route('register.child.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf

                {{-- Child Image Upload --}}
                <div x-data="{ fileName: '', filePreview: '', isDragging: false, handleDrop(e) {
                    this.isDragging = false;
                    const file = e.dataTransfer.files[0];
                    if (file && file.type.startsWith('image/')) this.previewFile(file);
                }, handleFileSelect(e) {
                    const file = e.target.files[0];
                    if (file && file.type.startsWith('image/')) this.previewFile(file);
                }, previewFile(file) {
                    this.fileName = file.name;
                    const reader = new FileReader();
                    reader.onload = (event) => this.filePreview = event.target.result;
                    reader.readAsDataURL(file);
                } }" class="space-y-2">
                    
                    <label class="block text-sm font-medium text-gray-700">
                        Child Image (Photo) 
                        <span class="text-red-500 text-xs italic">(Max 1MB)</span>
                    </label>

                    <div class="relative flex flex-col items-center justify-center w-full border-2 border-dashed rounded-lg p-4 sm:p-6 cursor-pointer transition-all duration-200"
                        :class="isDragging ? 'border-green-600 bg-green-50' : 'border-gray-300 hover:border-green-500 hover:bg-gray-50'"
                        @dragover.prevent="isDragging = true"
                        @dragleave.prevent="isDragging = false"
                        @drop.prevent="handleDrop($event)"
                        @click="$refs.input.click()">

                        <input type="file" name="child_image" accept="image/*" x-ref="input" class="hidden" @change="handleFileSelect" required>

                        <template x-if="!filePreview">
                            <div class="text-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-10 sm:h-12 w-10 sm:w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16V4a1 1 0 011-1h8a1 1 0 011 1v12m-9 4h6m2 0a2 2 0 01-2 2H9a2 2 0 01-2-2m2 0h6" />
                                </svg>
                                <p class="mt-2"><span class="font-semibold">Click to upload</span> or drag & drop</p>
                                <p class="text-xs text-gray-500">Only JPG or PNG</p>
                            </div>
                        </template>

                        <template x-if="filePreview">
                            <div class="w-full text-center">
                                <img :src="filePreview" alt="Preview" class="mx-auto h-32 sm:h-40 rounded-lg object-cover shadow-sm border" />
                                <p class="mt-2 text-sm truncate" x-text="fileName"></p>
                                <button type="button" class="mt-2 px-3 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-600"
                                    @click="filePreview = ''; fileName = ''; $refs.input.value = ''">
                                    Remove
                                </button>
                            </div>
                        </template>
                    </div>
                </div>

                {{-- Full Name --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="fullname" value="{{ old('fullname') }}"
                        class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-700 focus:border-green-700 text-sm sm:text-base" required>
                </div>

                {{-- Organization --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Organization/Church</label>
                    <input type="text" name="organization" value="{{ old('organization') }}"
                        class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-700 focus:border-green-700 text-sm sm:text-base">
                </div>

                {{-- Age and Gender --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Age</label>
                        <input type="number" name="age" min="1" value="{{ old('age') }}"
                            class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-700 focus:border-green-700 text-sm sm:text-base" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Gender</label>
                        <select name="gender" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-700 focus:border-green-700 text-sm sm:text-base">
                            <option value="">Select</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                </div>

                {{-- Birth Certificate Upload --}}
                <div x-data="{ fileName: '', filePreview: '', isDragging: false, handleDrop(e) {
                        this.isDragging = false;
                        const file = e.dataTransfer.files[0];
                        if (file && file.type.startsWith('image/')) this.previewFile(file);
                    }, handleFileSelect(e) {
                        const file = e.target.files[0];
                        if (file && file.type.startsWith('image/')) this.previewFile(file);
                    }, previewFile(file) {
                        this.fileName = file.name;
                        const reader = new FileReader();
                        reader.onload = (event) => this.filePreview = event.target.result;
                        reader.readAsDataURL(file);
                    } }" class="space-y-2">

                    <label class="block text-sm font-medium text-gray-700">
                        Birth Certificate (Image only) 
                        <span class="text-red-500 text-xs italic">(Max 1MB)</span>
                    </label>

                    <div class="relative flex flex-col items-center justify-center w-full border-2 border-dashed rounded-lg p-4 sm:p-6 cursor-pointer transition-all duration-200"
                        :class="isDragging ? 'border-indigo-500 bg-indigo-50' : 'border-gray-300 hover:border-indigo-400 hover:bg-gray-50'"
                        @dragover.prevent="isDragging = true"
                        @dragleave.prevent="isDragging = false"
                        @drop.prevent="handleDrop($event)"
                        @click="$refs.input.click()">
                        <input type="file" name="birth_certificate" accept="image/*" x-ref="input" class="hidden" @change="handleFileSelect" required>

                        <template x-if="!filePreview">
                            <div class="text-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-10 sm:h-12 w-10 sm:w-12 text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16V4a1 1 0 011-1h8a1 1 0 011 1v12m-9 4h6m2 0a2 2 0 01-2 2H9a2 2 0 01-2-2m2 0h6" />
                                </svg>
                                <p class="mt-2"><span class="font-semibold">Click to upload</span> or drag & drop</p>
                                <p class="text-xs text-gray-500">Only JPG or PNG</p>
                            </div>
                        </template>

                        <template x-if="filePreview">
                            <div class="w-full text-center">
                                <img :src="filePreview" alt="Preview" class="mx-auto h-32 rounded-lg object-cover shadow-sm border" />
                                <p class="mt-2 text-sm truncate" x-text="fileName"></p>
                                <button type="button" class="mt-2 px-3 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-600"
                                    @click="filePreview = ''; fileName = ''; $refs.input.value = ''">
                                    Remove
                                </button>
                            </div>
                        </template>
                    </div>
                </div>

                {{-- Parent Info --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Parent/Guardian Name</label>
                        <input type="text" name="parent_name" value="{{ old('parent_name') }}"
                            class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-700 focus:border-green-700 text-sm sm:text-base" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Parent/Guardian Phone</label>
                        <input type="tel" name="parent_phone" value="{{ old('parent_phone') }}"
                            class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-700 focus:border-green-700 text-sm sm:text-base" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Parent/Guardian Email</label>
                        <input type="email" name="parent_email" value="{{ old('parent_email') }}"
                            class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-700 focus:border-green-700 text-sm sm:text-base" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">LGA of Residence</label>
                        <select name="lga"
                            class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-700 focus:border-green-700 text-sm sm:text-base">
                            <option value="">Select LGA</option>
                            <option value="Jos North" {{ old('lga') == 'Jos North' ? 'selected' : '' }}>Jos North</option>
                            <option value="Jos South" {{ old('lga') == 'Jos South' ? 'selected' : '' }}>Jos South</option>
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Area of Interest</label>
                        <select name="interest_area"
                            class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-800 focus:border-green-800 text-sm sm:text-base">
                            <option value="">Select</option>
                            <option value="Quiz" {{ old('interest_area') == 'Quiz' ? 'selected' : '' }}>Quiz</option>
                            <option value="Bible Recitation" {{ old('interest_area') == 'Bible Recitation' ? 'selected' : '' }}>Bible Recitation</option>
                        </select>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="pt-4">
                    <button type="submit" class="w-full bg-green-700 text-white font-semibold py-3 sm:py-4 rounded-lg hover:bg-green-900 transition text-sm sm:text-base">
                        Submit Registration
                    </button>
                </div>
            </form>

            <p class="text-center text-gray-400 text-xs sm:text-sm mt-4">
                © {{ date('Y') }} Plateau Carol Competition
            </p>
        </div>
    </div>
</x-guest-layout>
