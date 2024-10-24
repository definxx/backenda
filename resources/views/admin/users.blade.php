<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="bg-orange p-4 text-white">
        <div class="flex justify-between items-center max-w-6xl mx-auto">
            <h1 class="text-2xl font-bold">Manage Users</h1>
            <ul class="flex space-x-6">
                <li><a href="{{ route('admin.dashboard') }}" class="hover:underline">Home</a></li>
                <li><a href="{{ route('admin.users') }}" class="hover:underline">Users</a></li>
                <li><a href="{{ route('adminhosts') }}" class="hover:underline">Hosts</a></li>
                <li><a href="{{ route('admin.students') }}" class="hover:underline">Students</a></li>
                <li><a href="#" class="hover:underline">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow max-w-6xl mx-auto p-6">
        <h2 class="text-3xl font-bold text-gray-700 mb-6">User Management</h2>

        <!-- Users List -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <ul class="space-y-3">
                @foreach($users as $user)
                <li class="flex justify-between items-center">
                    <span>{{ $user->name }} ({{ $user->accounttype }})</span>
                    <div class="flex space-x-3">
                        <button class="text-blue-600 hover:underline">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="text-red-600 hover:underline">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-4">
        <div class="text-center">
            &copy; 2024 24Finder. All rights reserved.
        </div>
    </footer>
</body>
</html>
