@include('auth.header')

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .text-orange {
            color: #F08000;
        }

        .bg-orange {
            background-color: #F08000;
        }

        .border-orange {
            border-color: #F08000;
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-8 max-w-md w-full">
            <h2 class="text-2xl font-bold text-center mb-6" style="color: #F08000">
                Login
            </h2>

            <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                @csrf

                <!-- Email Input -->
                <div class="mb-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email"
                        class="block mt-1 w-full bg-white text-gray-900 border-black border-2 dark:bg-gray-700 dark:text-gray-300"
                        style="height: 1cm;" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <!-- Password Input -->
                <div class="mb-4 relative">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password"
                        class="block mt-1 w-full bg-white text-gray-900 border-black border-2 dark:bg-gray-700 dark:text-gray-300"
                        style="height: 1cm;" type="password" name="password" required autocomplete="new-password" />
                    <span class="absolute right-3 top-10 cursor-pointer" onclick="togglePassword('password')">
                        <i id="password-eye" class="fas fa-eye"></i>
                    </span>
                </div>

                <script>
                    function togglePassword(id) {
                        const passwordField = document.getElementById(id);
                        const eyeIcon = document.getElementById(id + '-eye');

                        if (passwordField.type === "password") {
                            passwordField.type = "text";
                            eyeIcon.classList.remove('fa-eye');
                            eyeIcon.classList.add('fa-eye-slash');
                        } else {
                            passwordField.type = "password";
                            eyeIcon.classList.remove('fa-eye-slash');
                            eyeIcon.classList.add('fa-eye');
                        }
                    }
                </script>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button
                        class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit" style="background-color: #F08000">
                        Login
                    </button>
                </div>
            </form>

            <!-- Register Link -->
            <p class="mt-4 text-center text-gray-600 dark:text-gray-400 text-sm">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-orange-500 hover:text-orange"
                    style="color: #F08000">
                    Register
                </a>.
            </p>

            <!-- Forgot Password Link -->
            <p class="mt-4 text-center text-gray-600 dark:text-gray-400 text-sm">
                Forgot your
                @if (Route::has('password.request'))
                <a class="text-orange hover:text-orange" style="color: #F08000"
                    href="{{ route('password.request') }}">
                    {{ __('password?') }}
                </a>
                @endif
            </p>

        </div>
    </div>

    @include('auth.footer')
</body>

</html>
