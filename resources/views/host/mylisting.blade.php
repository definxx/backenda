@include('host.header')

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
                                Booking of {{ $booking->sharespace->sharespace_user_title }}
                            </h3>
                            <p class="text-gray-600 text-sm">
                                Check-in: {{ \Carbon\Carbon::parse($booking->check_in)->format('F d, Y') }} · 
                                Check-out: {{ \Carbon\Carbon::parse($booking->check_out)->format('F d, Y') }}
                            </p>
                            <p class="text-gray-600 text-sm">
                                Booked by: {{ $booking->user->name }} ({{ $booking->user->email }})
                            </p>
                            <p class="text-gray-600 text-sm">
                                Phone: {{ $booking->user->tel }}
                            </p>
                            <p class="text-gray-600 text-sm">
                                Gender: {{ ucfirst($booking->user->gender) }}
                            </p>
                            @if($booking->special_requests)
                            <p class="text-gray-600 text-sm">
                                Special Requests: {{ $booking->special_requests }}
                            </p>
                            @endif
                        </div>

                        <!-- Conditionally display the form based on the booking status -->
                        @if($booking->status !== 'canceled')
                        <div class="flex items-center space-x-4">
                            <!-- Form for updating booking status -->
                            <form action="{{ route('bookings.updateStatus', $booking->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="text-gray-700 text-sm">
                                    <option value="processing" {{ $booking->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="denied" {{ $booking->status == 'denied' ? 'selected' : '' }}>Denied</option>
                                    <option value="canceled" {{ $booking->status == 'canceled' ? 'selected' : '' }}>canceled</option>
                                </select>
                            </form>
                        </div>
                        @else
                        <div class="flex items-center space-x-4">
                            <p class="text-gray-600 text-sm font-semibold">Status: {{ ucfirst($booking->status) }}</p>
                        </div>
                        @endif
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-gray-700 text-sm">
                            Number of Guests: <span class="font-bold">{{ $booking->number_of_guests }}</span>
                        </p>
                        <p class="text-gray-700 text-sm">
                            Total Price: <span class="font-bold">${{ $booking->sharespace->sharespace_user_price }}</span>
                        </p>
                        <p class="text-green-600 text-sm font-semibold">
                            Status: {{ ucfirst($booking->status) }}
                        </p>
                    </div>
                    <!-- Link to view the share space -->
                    <div class="mt-4">
                        <a href="{{ route('viewspace', $booking->sharespace->id) }}" class="text-blue-600 hover:underline text-sm">
                            View Share Space Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
