<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roommate Finder - Profile Settings</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Header -->
    <header class="bg-orange-500 text-white py-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-semibold">Roommate Finder - Profile Settings</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#" class="hover:underline">Home</a></li>
                    <li><a href="#" class="hover:underline">Profile</a></li>
                    <li><a href="#" class="hover:underline">Settings</a></li>
                    <li><a href="#" class="hover:underline">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="min-h-screen p-8">
        <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-lg">
            <div class="flex">
                <!-- Sidebar -->
                <aside class="w-1/4 p-6 border-r border-gray-200">
                    <h2 class="text-lg font-semibold mb-4">My Profile</h2>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="block py-2 px-3 rounded hover:bg-gray-100 text-gray-800 font-medium">Basics</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 rounded hover:bg-gray-100 text-gray-800 font-medium">Preferences</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 rounded bg-orange-500 text-white font-medium">Roommate Preferences</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 rounded hover:bg-gray-100 text-gray-800 font-medium">Preview Your Profile</a>
                        </li>
                    </ul>
                </aside>
                <!-- Main Content -->
                <section class="w-3/4 p-6">
                    <h2 class="text-xl font-semibold mb-4">Roommate Requirements and Preferences</h2>
                    <form>
                        <!-- Question 1 -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2" for="roommate-looking-for">
                                What are you looking for in a roommate?
                            </label>
                            <textarea id="roommate-looking-for" rows="4" class="w-full p-3 border border-gray-300 rounded-lg"></textarea>
                        </div>

                        <!-- Question 2 -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">Do you prefer a roommate who already has a specific lifestyle or are you open to different lifestyles?</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="lifestyle" class="form-radio text-orange-500" checked>
                                    <span class="ml-2">I prefer a roommate with a specific lifestyle</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="lifestyle" class="form-radio text-orange-500">
                                    <span class="ml-2">I am open to different lifestyles</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="lifestyle" class="form-radio text-orange-500">
                                    <span class="ml-2">No preference</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 3 -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">Do you have a preference for a certain age group?</label>
                            <input type="range" min="18" max="60" value="25" class="w-full bg-orange-500 h-2 rounded-lg appearance-none">
                        </div>

                        <!-- Question 4 -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">What are your location preferences?</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="location" class="form-radio text-orange-500">
                                    <span class="ml-2">Within a certain distance of me</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="location" class="form-radio text-orange-500">
                                    <span class="ml-2">In my city</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="location" class="form-radio text-orange-500" checked>
                                    <span class="ml-2">In my region</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="location" class="form-radio text-orange-500">
                                    <span class="ml-2">No preference</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 5 -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">What type of living environment do you prefer?</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" name="environment" class="form-checkbox text-orange-500">
                                    <span class="ml-2">Quiet and peaceful</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="environment" class="form-checkbox text-orange-500">
                                    <span class="ml-2">Social and active</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="environment" class="form-checkbox text-orange-500">
                                    <span class="ml-2">No preference</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 6 -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">Do you have any specific requirements or restrictions?</label>
                            <textarea id="requirements" rows="4" class="w-full p-3 border border-gray-300 rounded-lg"></textarea>
                        </div>

                        <!-- Save Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-lg font-semibold">Save</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </main>
</body>
</html>
