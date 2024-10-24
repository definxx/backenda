<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="bg-orange p-4 text-white">
        <div class="flex justify-between items-center max-w-6xl mx-auto">
            <h1 class="text-2xl font-bold">Admin Dashboard</h1>
            <ul class="flex space-x-6">
                <li><a href="{{ route('admin.dashboard') }}" class="hover:underline">Home</a></li>
                <li><a href="{{ route('admin.users') }}" class="hover:underline">Users</a></li>
                <li><a href="{{ route('admin.hosts') }}" class="hover:underline">Hosts</a></li>
                <li><a href="{{ route('admin.students') }}" class="hover:underline">Students</a></li>
                <li><a href="{{ route('logout') }}" class="hover:underline">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow max-w-6xl mx-auto p-6">
        <h2 class="text-3xl font-bold text-gray-700 mb-6">Dashboard Overview</h2>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Total Users Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="bg-orange-100 p-4 rounded-full">
                        <i class="fas fa-users text-orange text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-800">Total Users</h3>
                        <p class="text-gray-500">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Hosts Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="bg-orange-100 p-4 rounded-full">
                        <i class="fas fa-house-user text-orange text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-800">Total Hosts</h3>
                        <p class="text-gray-500">{{ $totalHosts }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Students Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="bg-orange-100 p-4 rounded-full">
                        <i class="fas fa-graduation-cap text-orange text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-800">Total Students</h3>
                        <p class="text-gray-500">{{ $totalStudents }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Bookings Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="bg-orange-100 p-4 rounded-full">
                        <i class="fas fa-book text-orange text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-800">Total Bookings</h3>
                        <p class="text-gray-500">{{ $totalBookings }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-4">
        <div class="text-center">
            &copy; 2024 Your Company. All rights reserved.
        </div>
    </footer>
</body>
</html>
