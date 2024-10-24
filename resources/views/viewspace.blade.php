@include('header')

<!-- Main Content -->
<main class="flex-grow container mx-auto px-4 py-6">
    <div class="w-full max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8">
        
        @if($viewspace)
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <!-- Display Errors Here -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <strong class="font-bold">Whoops!</strong>
                        <span class="block sm:inline">There were some problems with your input.</span>
                        <ul class="mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- Carousel for images -->
                <div class="carousel relative w-full overflow-hidden rounded-lg mb-4">
                    <div class="carousel-inner">
                        @if($viewspace->images->isNotEmpty())
                            @foreach($viewspace->images as $image)
                                <div class="carousel-item">
                                    <img
                                        src="{{ asset('public/'.$image->path) }}"                                        alt="Property Image"
                                        class="w-full h-48 object-cover"
                                    />
                                </div>
                            @endforeach
                        @else
                            <p class="text-gray-500">No images available</p>
                        @endif
                    </div>
                    <!-- Previous button -->
                    <button
                        class="carousel-prev absolute left-0 top-1/2 transform -translate-y-1/2 text-gray-700 text-white p-2 rounded-full"
                    >
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <!-- Next button -->
                    <button
                        class="carousel-next absolute right-0 top-1/2 transform -translate-y-1/2 text-gray-700 text-white p-2 rounded-full"
                    >
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
    
                <!-- ShareSpace Details -->
                <form action="{{ route('uploadprofile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-gray-700">
                            <i class="fas fa-home text-gray-700 mr-2"></i>
                            {{ $viewspace->sharespace_user_title }}
                        </h3>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-gray-700">
                            <i class="fas fa-wallet text-gray-700"></i> ₦
                            {{ $viewspace->sharespace_user_price }}
                        </h3>
                    </div>

                 
             
                    
                    <div class="mb-4">
                        <p class="text-gray-500 mb-2">
                            <i class="fas fa-map-marker-alt text-gray-700 mr-2"></i>
                            {{ $viewspace->sharespace_user_location }}
                        </p>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-700 font-semibold mb-2">
                            <i class="fas fa-address-card text-gray-700 mr-2"></i>
                            {{ $viewspace->sharespace_user_address }}
                        </p>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-600 mb-4">
                            <i class="fas fa-info-circle text-gray-700 mr-2"></i>
                            {{ $viewspace->sharespace_user_description }}
                        </p>
                    </div>
                </form>
                
                <!-- Book button with icon -->
                <div class="flex space-x-2 mt-4">
                    <button id="book-button"   style="background-color: #F08000;"
                            class="text-gray-700 text-white px-4 py-2 rounded-md hover:text-gray-700">
                        <i class="fas fa-info-circle"  style="  background-color: #F08000;"></i> Book 
                    </button>
                </div>
            </div>
        @else
            <p class="text-center text-gray-600">No ShareSpace found.</p>
        @endif

        <!-- Back to Home -->
        <div class="text-center mt-4">
            <a href="{{ route('/') }}" class="text-gray-700 hover:underline font-medium text-sm">
                <i class="fas fa-arrow-left mr-1"></i> Back to Home
            </a>
        </div>
    </div>
</main>

<!-- Booking Modal -->
<div id="book-modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg relative">
        <button id="close-modal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            <i class="fa fa-times"></i>
        </button>
        <form action="{{ route('book.apartment') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Hidden Property ID -->
            <input type="hidden" name="sharespace_id" value="{{ $viewspace->id }}">

            <!-- Booking Details -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="check_in">
                    Check-In Date
                </label>
                <div class="flex items-center border border-gray-300 rounded-md">
                    <i class="fa fa-calendar-alt text-gray-700 p-2"></i>
                    <input name="check_in" class="w-full p-2 outline-none" type="date" id="check_in" required />
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="check_out">
                    Check-Out Date
                </label>
                <div class="flex items-center border border-gray-300 rounded-md">
                    <i class="fa fa-calendar-alt text-gray-700 p-2"></i>
                    <input name="check_out" class="w-full p-2 outline-none" type="date" id="check_out" required />
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="number_of_guests">
                    Number of Guests
                </label>
                <div class="flex items-center border border-gray-300 rounded-md">
                    <i class="fa fa-users text-gray-700 p-2"></i>
                    <input name="number_of_guests" class="w-full p-2 outline-none" type="number" id="number_of_guests" placeholder="Enter number of guests" required />
                </div>
            </div>

            <!-- Special Requests -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="special_requests">
                    Special Requests
                </label>
                <textarea name="special_requests" class="w-full p-2 border border-gray-300 rounded-md outline-none" id="special_requests" rows="3" placeholder="Enter any special requests or requirements"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button class="text-gray-700 text-white px-4 py-2 rounded-md hover:text-gray-700">
                    <i class="fa fa-check-circle"></i> Book Now
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bookButton = document.getElementById('book-button');
        const bookModal = document.getElementById('book-modal');
        const closeModalButton = document.getElementById('close-modal');

        bookButton.addEventListener('click', function () {
            bookModal.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', function () {
            bookModal.classList.add('hidden');
        });

        // Carousel functionality
        const prevBtn = document.querySelector('.carousel-prev');
        const nextBtn = document.querySelector('.carousel-next');
        const items = document.querySelectorAll('.carousel-item');
        let currentIndex = 0;

        function showItem(index) {
            items.forEach((item, i) => {
                item.classList.toggle('block', i === index);
                item.classList.toggle('hidden', i !== index);
            });
        }

        prevBtn.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            showItem(currentIndex);
        });

        nextBtn.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % items.length;
            showItem(currentIndex);
        });

        showItem(currentIndex);
    });
</script>

@include('footer')
