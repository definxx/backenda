<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Students</title>
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
        <h2 class="text-3xl font-bold text-gray-700 mb-6">Students List</h2>

        <!-- Students Table -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($students as $student)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $student->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $student->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <!-- Add more actions if needed -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
