@include('header')

<!-- Listings -->
<main class="flex-grow max-w-6xl mx-auto p-6">
    <!-- Property Card -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($sharespaces as $sharespace)
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <div class="carousel relative w-full overflow-hidden rounded-lg mb-4">
                    <div class="carousel-inner">
                        @foreach($sharespace->images as $image)
                            <div class="carousel-item">
                                <img
                                    src="{{ asset('public/'.$image->path) }}"                                    alt="Property Image"
                                    class="w-full h-48 object-cover"
                                />
                            </div>
                        @endforeach
                    </div>
                    <button
                        class="carousel-prev absolute left-0 top-1/2 transform -translate-y-1/2 bg-orange text-white p-2 rounded-full"
                    >
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button
                        class="carousel-next absolute right-0 top-1/2 transform -translate-y-1/2 bg-orange text-white p-2 rounded-full"
                    >
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <h3 class="text-xl font-bold text-gray-700">
                    <i class="fas fa-building text-orange"></i> {{ $sharespace->sharespace_user_title }}
                </h3>
                <p class="text-gray-700 mb-4">
                    <i class="fas fa-money-bill-wave text-orange"></i> {{ $sharespace->sharespace_user_price }}
                </p>
                
                <p class="text-gray-700 mb-4">
                    <i class="fas fa-wallet text-orange"></i> ₦{{ $sharespace->sharespace_user_price }}
                </p>
                
                <p class="text-gray-500 mb-2">
                    <i class="fas fa-map-marker-alt text-orange"></i>
                    {{ $sharespace->sharespace_user_location }}
                </p>
                <p class="text-gray-700 font-semibold mb-2">
                    <i class="fas fa-home text-orange"></i> {{ $sharespace->sharespace_user_address }}
                </p>
                <p class="text-gray-600 mb-4">
                    <i class="fas fa-info-circle text-orange"></i> {{ $sharespace->sharespace_user_description }}
                </p>

                <div class="flex space-x-2">
                    <a href="{{route('viewspace',$sharespace->id)}}">
                        <button
                        class="bg-orange text-white px-4 py-2 rounded-md hover:bg-orange-700"
                    >
                        <i class="fas fa-info-circle"></i> View 
                    </button>

                    </a>
                   
                    
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</main>

<!-- Tailwind Carousel Script -->
<script>
    const carousels = document.querySelectorAll(".carousel");
    carousels.forEach((carousel) => {
        const items = carousel.querySelectorAll(".carousel-item");
        const prevBtn = carousel.querySelector(".carousel-prev");
        const nextBtn = carousel.querySelector(".carousel-next");
        let currentIndex = 0;

        function showItem(index) {
            items.forEach((item, i) => {
                item.style.display = i === index ? "block" : "none";
            });
        }

        prevBtn.addEventListener("click", () => {
            currentIndex =
                (currentIndex - 1 + items.length) % items.length;
            showItem(currentIndex);
        });

        nextBtn.addEventListener("click", () => {
            currentIndex = (currentIndex + 1) % items.length;
            showItem(currentIndex);
        });

        showItem(currentIndex);
    });
</script>

@include('footer')
