@include('host.header')

<!-- Main Content -->
<main class="flex-grow container mx-auto px-4 py-6">
    <div class="w-full max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8">
        <form action="{{ route('uploadprofile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Profile Picture -->
            <div class="text-center mb-6">
                <div class="relative inline-block">
                     <img id="profile-picture" 
                    class="w-40 h-40 rounded-full border-4 border-orange-600 shadow-lg" 
                    src="{{ optional(Auth::user()->profile)->profile_user_pic ? asset('public/' . optional(Auth::user()->profile)->profile_user_pic) : 'https://via.placeholder.com/150' }}" 
                    alt="Profile Picture" 
                    required />
                    <label for="profile-pic-upload"
                        class="absolute bottom-0 right-0 bg-orange p-2 rounded-full shadow-md cursor-pointer">
                        <i class="fas fa-camera text-white"></i>
                    </label>
                    <input name="profile_user_pic" type="file" id="profile-pic-upload" class="hidden" accept="image/*" />
                </div>
                <p class="text-sm text-gray-500 mt-2">Allowed formats: JPG, PNG, GIF, SVG, WEBP. Max size: 4MB.</p>
            </div>
        
            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                <div class="flex items-center border-2 rounded-lg focus-within:ring-2 focus-within:ring-orange-500">
                    <span class="px-3 text-gray-600"><i class="fas fa-user"></i></span>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 focus:outline-none rounded-r-lg" value="{{ Auth::user()->name }}" {{ Auth::user()->profile ? 'disabled' : '' }} />
                </div>
            </div>
        
            <!-- Gender -->
            <div class="mb-4">
                <label for="gender" class="block text-gray-700 font-semibold mb-2">Gender</label>
                <div class="flex items-center border-2 rounded-lg focus-within:ring-2 focus-within:ring-orange-500">
                    @php
                        $gender = (Auth::user()->gender);
                    @endphp
                    @if ($gender == 'male')
                        <span class="px-3 text-gray-600"><i class="fas fa-mars"></i> Male</span>
                    @elseif ($gender == 'female')
                        <span class="px-3 text-gray-600"><i class="fas fa-venus"></i> Female</span>
                    @else
                        <span class="px-3 text-gray-600"><i class="fas fa-genderless"></i> Any</span>
                    @endif
                </div>
            </div>
        
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                <div class="flex items-center border-2 rounded-lg focus-within:ring-2 focus-within:ring-orange-500">
                    <span class="px-3 text-gray-600"><i class="fas fa-envelope"></i></span>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 focus:outline-none rounded-r-lg" value="{{ Auth::user()->email }}" {{ Auth::user()->profile ? 'disabled' : '' }} />
                </div>
            </div>
        
            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                <div class="flex items-center border-2 rounded-lg focus-within:ring-2 focus-within:ring-orange-500">
                    <span class="px-3 text-gray-600"><i class="fas fa-phone"></i></span>
                    <input type="tel" id="phone" name="phone" class="w-full px-3 py-2 focus:outline-none rounded-r-lg" value="{{ Auth::user()->tel }}" {{ Auth::user()->profile ? 'disabled' : '' }} />
                </div>
            </div>
        
            <!-- Bio -->
            <div class="mb-4">
                <label for="bio" class="block text-gray-700 font-semibold mb-2">Bio</label>
                <textarea id="bio" name="profile_user_bio" rows="4" class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500" placeholder="Tell us about yourself...">{{ optional(Auth::user()->profile)->profile_user_bio }}</textarea>
            </div>
            
        
            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-semibold mb-2">Address</label>
                <input type="text" id="address" name="profile_user_address" class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500" value="{{ optional(Auth::user()->profile)->profile_user_address }}" {{ Auth::user()->profile ? 'disabled' : '' }} />
            </div>
        
            <!-- State -->
            <div class="mb-4">
                <label for="state" class="block text-gray-700 font-semibold mb-2">State</label>
                <input type="text" id="state" name="profile_user_state" class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500" value="{{ optional(Auth::user()->profile)->profile_user_state }}" {{ Auth::user()->profile ? 'disabled' : '' }} />
            </div>
        
            <!-- Town -->
            <div class="mb-4">
                <label for="town" class="block text-gray-700 font-semibold mb-2">Town</label>
                <input type="text" id="town" name="profile_user_town" class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500" value="{{ optional(Auth::user()->profile)->profile_user_town }}" {{ Auth::user()->profile ? 'disabled' : '' }} />
            </div>
        
            <!-- Postal Code -->
            <div class="mb-4">
                <label for="postal_code" class="block text-gray-700 font-semibold mb-2">Postal Code</label>
                <input type="number" id="postal_code" name="profile_user_postal_code" class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500" value="{{ optional(Auth::user()->profile)->profile_user_postal_code }}" {{ Auth::user()->profile ? 'disabled' : '' }} />
            </div>

            <!-- Country -->
            <div class="mb-4">
                <label for="profile_user_country" class="block text-gray-700 font-semibold mb-2">Country</label>
                <input type="text" id="profile_user_country" name="profile_user_country" class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500" value="{{ optional(Auth::user()->profile)->profile_user_country }}" {{ Auth::user()->profile ? 'disabled' : '' }} />
            </div>
        
            <!-- Date of Birth -->
            <div class="mb-4">
                <label for="date_of_birth" class="block text-gray-700 font-semibold mb-2">Date of Birth</label>
                <input type="date" id="date_of_birth" name="profile_user_date_of_birth" class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500" value="{{ optional(Auth::user()->profile)->profile_user_date_of_birth }}" {{ Auth::user()->profile ? 'disabled' : '' }} />
            </div>
        
            <!-- Save Changes Button -->
            <div class="mb-6">
                <button type="submit" class="w-full bg-orange text-white py-3 rounded-lg font-semibold hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 flex justify-center items-center shadow-lg">
                    <i class="fas fa-save mr-2"></i> Save Changes
                </button>
            </div>
        
            <!-- Back to process -->
            <div class="text-center">
                <a href="{{ route('/') }}" class="text-orange hover:underline font-medium text-sm">
                    <i class="fas fa-arrow-left mr-1"></i> Back to process
                </a>
            </div>
        </form>
    </div>
</main>

<!-- Footer -->
@include('footer')
