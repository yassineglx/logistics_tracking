<x-guest-layout>
   
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-xl overflow-hidden">
                <!-- Company Logo and Title -->
                <div class="px-6 py-8 text-center bg-gradient-to-r from-blue-600 to-blue-700">
                    <h1 class="text-2xl font-bold text-white">Create Account</h1>
                    <p class="mt-2 text-blue-100">Logistics Tracking Portal Registration</p>
                </div>

                <div class="p-6">
                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Full Name')" class="text-gray-700 dark:text-gray-300" />
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <x-text-input 
                                    id="name" 
                                    class="pl-10 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-500 focus:ring-blue-500"
                                    type="text" 
                                    name="name" 
                                    :value="old('name')" 
                                    required 
                                    autofocus 
                                    autocomplete="name" 
                                />
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Work Email')" class="text-gray-700 dark:text-gray-300" />
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </span>
                                <x-text-input 
                                    id="email" 
                                    class="pl-10 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-500 focus:ring-blue-500"
                                    type="email" 
                                    name="email" 
                                    :value="old('email')" 
                                    required 
                                    autocomplete="username" 
                                />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <x-text-input 
                                    id="password" 
                                    class="pl-10 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-500 focus:ring-blue-500"
                                    type="password"
                                    name="password"
                                    required 
                                    autocomplete="new-password" 
                                />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Password must be at least 8 characters</p>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 dark:text-gray-300" />
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <x-text-input 
                                    id="password_confirmation" 
                                    class="pl-10 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-500 focus:ring-blue-500"
                                    type="password"
                                    name="password_confirmation" 
                                    required 
                                    autocomplete="new-password" 
                                />
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" name="terms" type="checkbox" required class="rounded border-gray-300 dark:border-gray-600 text-blue-600 shadow-sm focus:ring-blue-500">
                            </div>
                            <div class="ml-3">
                                <label for="terms" class="text-sm text-gray-600 dark:text-gray-400">
                                    I agree to the <a href="#" class="text-blue-600 hover:text-blue-700">Terms of Service</a> and <a href="#" class="text-blue-600 hover:text-blue-700">Privacy Policy</a>
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <a class="text-sm text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300" 
                               href="{{ route('login') }}">
                                {{ __('Already have an account?') }}
                            </a>

                            <x-primary-button class="bg-blue-600 hover:bg-blue-700">
                                {{ __('Create Account') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Additional Info -->
                    <div class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                        <p>For corporate accounts, please contact your administrator</p>
                    </div>
                </div>
            </div>
        </div>

</x-guest-layout>