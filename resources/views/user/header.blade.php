<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>24Finder - Housing, Rooms for Rent, Student Accommodation, and Rental Solutions</title>

    <!-- Meta Description -->
    <meta name="description" content="24Finder offers a wide range of housing solutions. Find rooms for rent, student accommodation, and rental options for tenants, landlords, and agents. Discover the best housing deals today.">

    <!-- Meta Keywords -->
    <meta name="keywords" content="housing, rooms for rent, student accommodation, rental properties, landlord, tenant, rental agent, find a room, rent a house, shared housing, apartment rental">

    <!-- Meta Author -->
    <meta name="author" content="24Finder">

    <!-- Open Graph Tags for Social Media -->
    <meta property="og:title" content="24Finder - Housing, Rooms for Rent, Student Accommodation, and Rental Solutions">
    <meta property="og:description" content="Explore a wide range of housing options including rooms for rent, student housing, and rental properties. Whether you're a tenant, landlord, or agent, 24Finder has something for you.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://24finder.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="24Finder - Housing, Rooms for Rent, Student Accommodation, and Rental Solutions">
    <meta name="twitter:description" content="Discover the best housing options with 24Finder. Find rooms for rent, student accommodation, and rental solutions tailored for tenants, landlords, and agents.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">

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
                    <form action="{{ route('search') }}" method="GET" >
                        <input type="text"  name="query" placeholder="Search by location, price, or property type" 
                        class=" text-black bg-white w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-600">
                        <button class="absolute top-0 right-0 mt-2 mr-2 text-gray-600 hover:F08000">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Navigation Links -->
                @if (Route::has('login'))
                    <ul class="flex space-x-6 ml-6">
                        @auth
                            <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
                            <li><a href="{{route('booked')}}" class="hover:underline">Booked</a></li>
                            <li><a href="{{ route('preference') }}" class="hover:underline">Preference</a></li>
                            <li><a href="{{route('profile')}}" class="hover:underline">Profile</a></li>
                            <li><a href="{{route('inbox')}}" class="hover:underline">Inbox</a></li>
                            <li><a href="{{route('showlogout')}}" class="hover:underline">Logout</a></li>
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
                        <li><a href="{{route('booked')}}" class="hover:underline">Booked</a></li>
                        <li><a href="{{route('inbox')}}" class="hover:underline">Inbox</a></li>
                        <li><a href="{{route('profile')}}" class="hover:underline">Profile</a></li>
                        <li><a href="{{route('showlogout')}}" class="hover:underline">Logout</a></li>
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

    