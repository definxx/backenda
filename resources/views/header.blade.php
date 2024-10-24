<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>24Finder - Find Your Ideal Property</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="24Finder helps you find your ideal property by location, price, and type. Start your search now!">
    <meta name="keywords" content="real estate, property search, homes, apartments, rent, buy, sale">
    <meta name="author" content="24Finder">
    
    <!-- Open Graph Meta Tags (for social media sharing) -->
    <meta property="og:title" content="24Finder - Find Your Ideal Property">
    <meta property="og:description" content="24Finder helps you find your ideal property by location, price, and type. Start your search now!">
    <meta property="og:image" content="URL_TO_YOUR_IMAGE">
    <meta property="og:url" content="https://www.24finder.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="24Finder - Find Your Ideal Property">
    <meta name="twitter:description" content="24Finder helps you find your ideal property by location, price, and type. Start your search now!">
    <meta name="twitter:image" content="URL_TO_YOUR_IMAGE">

    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <!-- Stylesheets and Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  
    <style>
        .text-orange {
            color: #F08000;
        }
        .bg-orange {
            background-color: #F08000;
        }
        .border-orange {
            border-color: #F08000;
        }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="bg-orange p-4 text-white">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold"> <img src="{{asset('/public/uploads/logo/3.png')}}" width="60" height="60" alt="24finder"></h1>
            
            <!-- Mobile Menu Button -->
            <button class="text-white focus:outline-none lg:hidden" id="mobile-menu-button">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Links and Search Bar for Large Screens -->
            <div class="hidden lg:flex items-center justify-between w-full">
                <!-- Spacing for Centering Search Bar -->
                <div class="flex-1"></div>

                <!-- Search Bar -->
                <div class="relative w-1/2">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="query" placeholder="Search by location, price, or property type" 
                        class="text-black bg-white w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-600">
                        <button class="absolute top-0 right-0 mt-2 mr-2 text-gray-600 hover:text-orange">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                
                <!-- Navigation Links -->
                @if (Route::has('login'))
                    <ul class="flex space-x-6 ml-6">
                        @auth
                            <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
                            <li><a href="{{ route('showlogout') }}" class="hover:underline">Logout</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
                            @endif
                        @endauth
                    </ul>
                @endif
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="lg:hidden hidden" id="mobile-menu">
            <div class="mt-4 px-4">
                <input type="text" placeholder="Search by location, price, or property type" class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-600">
                <button class="mt-2 text-white bg-orange p-2 rounded-md w-full hover:bg-orange-700">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
            @if (Route::has('login'))
                <ul class="flex flex-col space-y-4 mt-4">
                    @auth
                        <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
                      
                        <li><a href="{{ route('logout') }}" class="hover:underline">Logout</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
                        @endif
                    @endauth
                </ul>
            @endif
        </div>
    </nav>