@include('host.header')

<!-- Main Content -->
<main class="flex-grow max-w-6xl mx-auto p-6">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4">Chat with {{ $messages->first()->user->name ?? 'Student' }}</h2>

        <div class="space-y-4">
            @foreach($messages as $message)
                <div class="p-4 rounded-lg {{ $message->user_id == Auth::id() ? 'bg-blue-100 text-right' : 'bg-gray-100' }}">
                    <p>{{ $message->message }}</p>
                    <small class="text-gray-500">{{ $message->created_at->diffForHumans() }}</small>
                </div>
            @endforeach
        </div>

        <!-- Send Message Form -->
        <form action="{{ route('message.send', $user_id) }}" method="POST" class="mt-6">
            @csrf
            <textarea name="message" rows="3" class="w-full p-2 border rounded" placeholder="Type your message..."></textarea>
            <button type="submit" class="bg-blue-600 text-white mt-2 px-4 py-2 rounded hover:bg-blue-700">
                Send Message
            </button>
        </form>
    </div>
</main>

@include('footer')
