@include('header')

<body class="bg-gray-100 font-sans leading-normal tracking-normal flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-md w-full text-center">
        <i class="fas fa-sign-out-alt text-5xl text-orange mb-4"></i>
        <h1 class="text-2xl font-bold text-orange mb-4">Logout</h1>
        <p class="text-gray-700 mb-6">Are you sure you want to log out?</p>
        <div class="flex justify-center space-x-4">
            <!-- Logout Form -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="bg-orange text-white px-4 py-2 rounded-lg hover:bg-orange focus:outline-none focus:ring-2 focus:ring-orange-500"
                >
                    <i class="fas fa-check mr-2"></i> Yes, Log Out
                </button>
            </form>
            <!-- Cancel Button -->
            <a
                href="{{ route('/') }}"
                class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
                <i class="fas fa-times mr-2"></i> Cancel
            </a>
        </div>
    </div>
</body>

@include('footer')
