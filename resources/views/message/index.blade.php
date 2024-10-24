
<div class="container mx-auto">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-xl font-bold mb-4">Chat</h2>
        <div class="overflow-y-auto max-h-96 mb-4">
            @foreach($messages as $message)
                <div class="mb-2 {{ $message->sender_id == auth()->id() ? 'text-right' : 'text-left' }}">
                    <span class="inline-block bg-{{ $message->sender_id == auth()->id() ? 'blue' : 'gray' }}-200 rounded-lg px-3 py-2">
                        {{ $message->message }}
                    </span>
                </div>
            @endforeach
        </div>

        <form action="{{ route('messages.store', $receiver_id) }}" method="POST">
            @csrf
            <div class="flex">
                <input type="text" name="message" class="flex-1 border rounded-l-lg p-2" placeholder="Type a message">
                <button type="submit" class="bg-blue-500 text-white rounded-r-lg px-4">Send</button>
            </div>
        </form>
    </div>
</div>

