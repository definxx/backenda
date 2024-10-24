@include('host.header')

<!-- Main Content -->
<main class="flex-grow max-w-6xl mx-auto p-6">
    <!-- Display Success Message -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Display Error Messages -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Oops!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Your Form -->
    <form action="{{ route('sharespace.post') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        <!-- Space Title -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="stitle">
                Space Title
            </label>
            <div class="flex items-center border border-gray-300 rounded-md">
                <i class="fas fa-home text-orange p-2"></i>
                <input
                    class="w-full p-2 outline-none"
                    type="text"
                    id="stitle"
                    name="sharespace_user_title"
                    placeholder="Enter a title for your space"
                    required
                />
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="stitle">
                Space Price
            </label>
            <div class="flex items-center border border-gray-300 rounded-md">
                <i class="fas fa-home text-orange p-2"></i>
                <input
                    class="w-full p-2 outline-none"
                    type="number"
                    id="stitle"
                    name="sharespace_user_price"
                    placeholder="Enter a title for your price"
                    required
                />
            </div>
        </div>
    
        <!-- Address -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                Address
            </label>
            <div class="flex items-center border border-gray-300 rounded-md">
                <i class="fas fa-map-marker-alt text-orange p-2"></i>
                <input
                    class="w-full p-2 outline-none"
                    type="text"
                    id="address"
                    name="sharespace_user_address"
                    placeholder="Enter the address of the space"
                    required
                />
            </div>
        </div>
    
        <!-- Location -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="location">
                Location
            </label>
            <div class="flex items-center border border-gray-300 rounded-md">
                <i class="fas fa-map-marked-alt text-orange p-2"></i>
                <input
                    class="w-full p-2 outline-none"
                    type="text"
                    id="location"
                    name="sharespace_user_location"
                    placeholder="Enter the location (e.g., city, state)"
                    required 
                />
            </div>
        </div>
    
        <!-- Images Upload -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="images">
                Upload Images
            </label>
            <div class="flex items-center border border-gray-300 rounded-md p-2">
                <i class="fas fa-image text-orange"></i>
                <input
                    class="w-full p-2 outline-none"
                    type="file"
                    id="images"
                    name="sharespace_user_images[]"
                    accept="image/*"
                    multiple
                />
            </div>
        </div>
    
        <!-- Description -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                Description
            </label>
            <div class="flex items-center border border-gray-300 rounded-md">
                <i class="fas fa-info-circle text-orange p-2"></i>
                <textarea
                    class="w-full p-2 outline-none"
                    id="description"
                    name="sharespace_user_description"
                    rows="4"
                    placeholder="Enter a brief description of the space you want to share"
                    required
                ></textarea>
            </div>
        </div>
    
        <!-- Submit Button -->
        <div class="text-right">
            <button type="submit" class="bg-orange text-white px-4 py-2 rounded-md hover:bg-orange-700">
                <i class="fas fa-check-circle"></i> Post Space
            </button>
        </div>
    </form>
</main>

@include('footer')
