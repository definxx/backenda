@include('user.header')

<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-5xl mx-auto bg-white shadow-lg rounded-lg p-8">

        <!-- Display Error Message -->
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ $errors->first('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.348 14.849a1 1 0 01-1.415 0L10 11.415l-2.933 2.934a1 1 0 11-1.414-1.415L8.586 10 5.653 7.067a1 1 0 111.414-1.414L10 8.586l2.934-2.933a1 1 0 111.414 1.414L11.414 10l2.934 2.933a1 1 0 010 1.415z"/>
                    </svg>
                </span>
            </div>
        @endif

        <!-- Booking List -->
        <div class="space-y-6">
            @foreach($bookings as $booking)
                <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">
                                Booking at {{ $booking->shareSpace->sharespace_user_title }}
                            </h3>
                            <p class="text-gray-600 text-sm">
                                Check-in: {{ \Carbon\Carbon::parse($booking->check_in)->format('F d, Y') }} · 
                                Check-out: {{ \Carbon\Carbon::parse($booking->check_out)->format('F d, Y') }}
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                @csrf
                                <button
                                    type="submit"
                                    class="text-red-600 hover:underline font-medium text-sm flex items-center"
                                >
                                    <i class="fas fa-times mr-1"></i> Cancel Booking
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Button to Open the Modal -->
                    <button 
                        type="button" 
                        onclick="openModal('messageModal{{ $booking->id }}')" 
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
                    >
                        Message Host
                    </button>

                    <!-- The Modal -->
                    <div id="messageModal{{ $booking->id }}" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center">
                        <div class="bg-white rounded-lg w-1/3 p-8">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-bold">Message Host</h3>
                                <button onclick="closeModal('messageModal{{ $booking->id }}')" class="text-gray-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <form action="{{ route('message.send', $booking->sharespace->user->id) }}" method="POST" class="mt-4">
                                @csrf
                                <textarea name="message" rows="4" class="w-full p-2 border rounded" placeholder="Type your message here..."></textarea>
                                <button type="submit" class="bg-blue-600 text-white mt-2 px-4 py-2 rounded hover:bg-blue-700">
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <p class="text-gray-700 text-sm">
                            Total Price: <span class="font-bold">${{ $booking->sharespace->sharespace_user_price }}</span>
                        </p>
                        <p class="text-green-600 text-sm font-semibold">
                            Status: {{ ucfirst($booking->status) }}
                        </p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('viewspace', $booking->sharespace->id) }}" class="text-blue-600 hover:underline text-sm">
                            View Share Space Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
</body>
