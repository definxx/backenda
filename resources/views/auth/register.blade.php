<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - YourApp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    @include('auth.header')

    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-8 max-w-md w-full">
            <h2 class="text-2xl font-bold text-center mb-6" style="color:#F08000">
                Create an Account
            </h2>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <!-- Name Input -->
                <div class="mb-4">
                    <x-label for="name" value="{{ __('Full Name') }}" />
                    <x-input id="name"
                        class="block mt-1 w-full bg-white text-gray-900 border-black border-2 dark:bg-gray-700 dark:text-gray-300"
                        style="height: 1cm;" type="text" name="name" :value="old('name')" required autofocus
                        autocomplete="name" />
                    @error('name')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tel Input -->
                <div class="mb-4">
                    <x-label for="tel" value="{{ __('Tel') }}" />
                    <x-input id="tel"
                        class="block mt-1 w-full bg-white text-gray-900 border-black border-2 dark:bg-gray-700 dark:text-gray-300"
                        style="height: 1cm;" type="number" name="tel" :value="old('tel')" required
                        autocomplete="tel" />
                    @error('tel')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Gender Input -->
                <div class="mb-4">
                    <x-label for="gender" value="{{ __('Gender') }}" />
                    <select id="gender" name="gender"
                        class="block mt-1 w-full bg-white text-gray-900 border-black border-2 dark:bg-gray-700 dark:text-gray-300">
                        <option value="">Select Gender</option>
                        <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Account Type Input -->
                <div class="mb-4">
                    <x-label for="accounttype" value="{{ __('Account Type') }}" />
                    <select id="accounttype" name="accounttype"
                        class="block mt-1 w-full bg-white text-gray-900 border-black border-2 dark:bg-gray-700 dark:text-gray-300">
                        <option value="">Select Account Type</option>
                        <option value="host" {{ old('accounttype') === 'host' ? 'selected' : '' }}>Host</option>
                        <option value="student" {{ old('accounttype') === 'student' ? 'selected' : '' }}>Student</option>
                    </select>
                    @error('accounttype')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Input -->
                <div class="mb-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email"
                        class="block mt-1 w-full bg-white text-gray-900 border-black border-2 dark:bg-gray-700 dark:text-gray-300"
                        style="height: 1cm;" type="email" name="email" :value="old('email')" required
                        autocomplete="email" />
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-4 relative">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password"
                        class="block mt-1 w-full bg-white text-gray-900 border-black border-2 dark:bg-gray-700 dark:text-gray-300"
                        style="height: 1cm;" type="password" name="password" required
                        autocomplete="new-password" />
                    <i id="password-eye" class="fas fa-eye absolute right-3 top-3 cursor-pointer text-gray-500 dark:text-gray-300"
                        onclick="togglePassword('password')"></i>
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password Input -->
                <div class="mb-6 relative">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation"
                        class="block mt-1 w-full bg-white text-gray-900 border-black border-2 dark:bg-gray-700 dark:text-gray-300"
                        style="height: 1cm;" type="password" name="password_confirmation" required
                        autocomplete="new-password" />
                    <i id="password_confirmation-eye" class="fas fa-eye absolute right-3 top-3 cursor-pointer text-gray-500 dark:text-gray-300"
                        onclick="togglePassword('password_confirmation')"></i>
                    @error('password_confirmation')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-orange-500 hover:bg-orange text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        style="  background-color: #F08000;">
                        Register
                    </button>
                </div>
            </form>

            <p class="mt-4 text-center text-gray-600 dark:text-gray-400 text-sm">
                Already have an account?
                <a href="{{ route('login') }}"
                    class="text-orange hover:text-orange"
                    style="background-color: white;">
                    Login here
                </a>.
            </p>
        </div>
    </div>

    @include('auth.footer')
</body>

</html>
