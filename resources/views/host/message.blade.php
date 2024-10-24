@include('host.header')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Chat with {{ $host->name }}</h2>

    <div class="bg-white p-4 rounded-lg shadow-lg mb-6">
        @foreach($messages as $message)
            <div class="{{ $message->sender_id === auth()->id() ? 'text-right' : 'text-left' }}">
                <p class="bg-gray-100 p-2 rounded-md inline-block mb-2 {{ $message->sender_id === auth()->id() ? 'bg-orange-100' : 'bg-gray-100' }}">
                    {{ $message->content }}
                </p>
            </div>
        @endforeach
    </div>

    <form action="{{ route('messages.send', $host->id) }}" method="POST" class="flex items-center">
        @csrf
        <input type="text" name="content" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Type your message..." required>
        <button type="submit" class="ml-2 bg-orange text-white px-4 py-2 rounded-md hover:bg-orange-700">Send</button>
    </form>
</div>
