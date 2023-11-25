<x-nav-layout>
    {{-- HERO START --}}
    <div class="m-12">
        <h1 class="mb-4 text-2xl font-bold dark:text-white">Trending Now</h1>
        <div class="rounded-md hero bg-slate-50 dark:bg-slate-600 shadow-md dark:text-white">
            <div class="hero-content flex-col lg:flex-row">
                <img src="{{ $specificAnime['images']['jpg']['image_url'] }}" class="h-64 rounded-lg shadow-2xl" />
                <div>
                    <div class="flex gap-2 my-2">
                        @foreach ($specificAnime['genres'] as $specAnime)
                            <h1 class="badge badge-outline">{{ $specAnime['name'] }}</h1>
                        @endforeach
                    </div>
                    <h1 class="text-5xl font-bold">{{ $specificAnime['title'] }}</h1>
                    <p class="py-6 textTitleContainer">{{ $specificAnime['synopsis'] }}</p>
                    <a
                        class="btn bg-blue-600 dark:bg-slate-700 hover:dark:bg-slate-300 hover:dark:text-slate-700 text-white">See
                        Details</a>
                </div>
            </div>
        </div>
    </div>
    {{-- HERO END --}}
    <div class="mx-12">
        <form method="GET" action="{{ url('/search') }}">
            <input class="input input-bordered w-full max-w-xs dark:bg-slate-400" type="text" name="anime_name"
                placeholder="Enter Anime Name" />
            <button class="btn btn-outline dark:text-slate-100 dark:border-slate-100" type="submit">Search</button>
        </form>
    </div>
    <div class="m-12">
        <div class="flex justify-between items-center mb-4 dark:text-white">
            <h1 class="text-2xl font-bold align-middle">New Added</h1>
            <a class="btn btn-sm btn-outline btn-info dark:border-white dark:text-white" href="">Add New</a>
        </div>
        <div class="grid md:grid-cols-5 grid-cols-2 sm:grid-cols-3 gap-6">
            @foreach ($paginatedData as $anime)
                <div class="card bg-base-100 dark:bg-slate-700 dark:text-white shadow-xl">
                    <figure>
                        <img class="h-80" src="{{ $anime['images']['jpg']['image_url'] }}" alt="" />
                    </figure>
                    <div class="m-4">
                        <div class="mb-2">
                            <h1 class="badge text-xs font-semibold
                            @if ($anime['type'] == 'TV' )
                                badge-primary
                            @elseif ($anime['type'] == 'Movie' )
                                badge-secondary
                            @elseif ($anime['type'] == 'Special')
                                badge-accent text-white
                            @elseif ($anime['type'] == 'OVA' )
                                badge-info text-white
                            @endif">{{ $anime['type'] }}</h1>
                        </div>
                        <div class="mb-2">
                            @foreach ($anime['genres'] as $genre)
                            <h1 class="badge text-xs font-semibold">{{ $genre['name'] }}</h1>
                            @endforeach
                        </div>
                        <h2 class="card-title">{{ $anime['title'] }}</h2>
                        <p class="textContainer dark:text-slate-300">{{ $anime['synopsis'] }}</p>
                        <div class="card-actions justify-end flex items-end">
                            <button class="btn btn-primary anime-button"
                                data-anime-id="{{ $anime['mal_id'] }}">Details</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center my-6">
            <div class="join">
                @php
                    $currentPage = $paginatedData->currentPage();
                    $lastPage = $paginatedData->lastPage();
                @endphp
                <button class="join-item btn dark:bg-slate-400 {{ $currentPage == 1 ? 'disabled' : '' }}"
                    @if ($currentPage != 1) onclick="window.location='{{ $paginatedData->previousPageUrl() }}'" @endif>«</button>
                <!-- Tampilkan tombol nomor halaman -->
                <button class="join-item btn dark:bg-slate-600 dark:border-slate-100 dark:text-slate-100" disabled>Page
                    {{ $currentPage }}</button>
                <button class="join-item btn dark:bg-slate-400 {{ $currentPage == $lastPage ? 'disabled' : '' }}"
                    @if ($currentPage != $lastPage) onclick="window.location='{{ $paginatedData->nextPageUrl() }}'" @endif>»</button>
            </div>
        </div>
    </div>


    <script>
        // Mengambil semua elemen tombol anime
        const animeButtons = document.querySelectorAll('.anime-button');

        // Menambahkan event listener untuk setiap tombol anime
        animeButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Mengambil ID anime dari atribut data-anime-id
                const animeId = button.getAttribute('data-anime-id');

                // Mengarahkan ke halaman baru dengan ID anime sebagai bagian dari URL
                window.location.href =
                    `/anime/${animeId}`; // Ganti '/anime/' dengan route yang sesuai di aplikasi Anda
            });
        });
    </script>
    <script>
        var textContainers = document.querySelectorAll('.textContainer');

        textContainers.forEach(function(container) {
            var originalText = container.innerHTML;
            var limitedText = originalText.substring(0, 50); // Ambil 50 karakter pertama
            var truncatedText = limitedText + (originalText.length > 50 ? '...' :
                '') // Tambahkan elipsis jika teks lebih dari 50 karakter
            container.innerHTML = truncatedText;
        });

        var textContainers = document.querySelectorAll('.textTitleContainer');

        textContainers.forEach(function(container) {
            var originalText = container.innerHTML;
            var limitedText = originalText.substring(0, 200); // Ambil 200 karakter pertama
            var truncatedText = limitedText + (originalText.length > 200 ? '...' :
                ''); // Tambahkan elipsis jika teks lebih dari 200 karakter
            container.innerHTML = truncatedText;
        });
    </script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</x-nav-layout>
