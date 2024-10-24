@include('auth.header')

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-8 max-w-md w-full">
        

            <div   class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
    
            @session('status')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ $value }}
                </div>
            @endsession
            <form method="POST" action="{{ route('password.email') }}" enctype="multipart/form-data">
                @csrf
                <!-- Email Input -->
                <div class="mb-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full bg-white text-gray-900 border-black border-2 dark:bg-gray-700 dark:text-gray-300" style="height: 1cm;" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                   
                            <x-button>
                                {{ __('Email Password Reset Link') }}
                            </x-button>
              
                </div>
            </form>

            <p class="mt-4 text-center text-gray-600 dark:text-gray-400 text-sm">
                Already have an account?
                <a href="{{ route('login') }}" class="text-orange-500 hover:text-gray-700" style="color: rgb(255, 87, 34)">
                    Login
                </a>.
            </p>

            

        </div>
    </div>
@include('auth.footer')
