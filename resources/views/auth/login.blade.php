<x-guest-layout>
   
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-xl overflow-hidden">
                <!-- Company Logo -->
                <div class="px-6 py-8 text-center bg-gradient-to-r from-blue-600 to-blue-700">
                    <h1 class="text-2xl font-bold text-white">Logistics Tracking Portal</h1>
                    <p class="mt-2 text-blue-100">Secure Access System</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="p-6">
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300" />
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
                                    autofocus 
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
                                    autocomplete="current-password" 
                                />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="flex items-center">
                                <input 
                                    id="remember_me" 
                                    type="checkbox" 
                                    class="rounded border-gray-300 dark:border-gray-600 text-blue-600 shadow-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800" 
                                    name="remember"
                                >
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300" 
                                   href="{{ route('password.request') }}">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>

                        <div>
                            <x-primary-button class="w-full justify-center bg-blue-600 hover:bg-blue-700">
                                {{ __('Sign in to Dashboard') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Additional Info -->
                    <div class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                        <p>Need access? Contact your system administrator</p>
                        <p class="mt-1">System protected by enterprise-grade security</p>
                    </div>
                </div>
            </div>
        </div>

</x-guest-layout>