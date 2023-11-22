
    <x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address & Username -->
            <div>
                <x-input-label for="id_user" :value="__('Email or Username')" />
                <x-text-input id="id_user" class="block mt-1 w-full" type="text" name="id_user" :value="old('id_user')" required
                    autofocus autocomplete="id_user" />
                <x-input-error :messages="$errors->get('id_user')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-slate-300">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-center gap-6 mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm dark:text-slate-300 dark:hover:text-slate-400 text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                @if (Route::has('register'))
                    <a class="underline text-sm dark:text-slate-300 dark:hover:text-slate-400 text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('register') }}">
                        {{ __('Dont Have An Account?') }}
                    </a>
                    @endif
                </div>
                <div class="grid mt-4">
                    <div class="mt-2 justify-self-center">
                        <x-primary-button>
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </div>



            <div class="text-center mt-4">
                <p class="dark:text-slate-300">Or Login With</p>
                {{-- icon social media --}}
                <div class="flex gap-4 justify-center">
                    <a href="{{ route('auth.google') }}">
                        <i class="bi bi-google dark:text-slate-300" style="font-size:24px; margin:5px"></i>
                    </a>
                    <a href="">
                        <i class="bi bi-github dark:text-slate-300" style="font-size:24px; margin:5px"></i>
                    </a>
                </div>
            </div>

        </form>
    </x-guest-layout>

