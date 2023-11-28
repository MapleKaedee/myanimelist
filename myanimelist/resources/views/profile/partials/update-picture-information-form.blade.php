<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-slate-100">
            {{ __('Profile Picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-slate-300">
            {{ __("Update your account's profile picture.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form class="mt-6" action="{{ route('upload.profile.picture') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-12">
            <div class="">
                <x-input-label for="profile_picture" :value="__('Profile Picture')" />
                <div class="">
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-slate-800 focus:outline-none dark:bg-slate-100 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" name="image" type="file">
                </div>
                <button class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-slate-100 dark:text-black dark:hover:bg-slate-300" type="submit">Upload</button>
            </div>
            <div class="grid justify-items-center">
                <img class="rounded-full w-64" src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}" alt="Profie Picture">
            </div>
        </div>

    </form>


    </form>
</section>
