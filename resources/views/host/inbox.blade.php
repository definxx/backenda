@include('host.header')

<!-- Main Content -->
<main class="flex-grow max-w-6xl mx-auto p-6">
    <!-- Management Sections -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Users Management -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <ul class="space-y-3">
                @foreach($students as $student)
                    <li class="flex justify-between items-center">
                        <a href="{{ route('host.chat.view', $student->id) }}" class="text-blue-600 hover:underline">
                            {{ $student->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</main>

@include('footer')
