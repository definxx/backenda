@include('auth.header')

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-8 max-w-md w-full">
    
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>
    
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to the email address you provided in your profile settings. If you cannot find the email, please check your spam box.') }}
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                    <a href="{{route('showlogout')}}" class="hover:underline">Logout</a>
                </div>
            </form>
        </div>
    </div>
    
@include('auth.footer')
