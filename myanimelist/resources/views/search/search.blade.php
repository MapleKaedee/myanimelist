<x-nav-layout>
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
    <div class="mx-12 mt-12">
        <form method="GET" action="{{ url('/search') }}">
            <input class="input input-bordered w-full max-w-xs dark:bg-slate-400" type="text" name="anime_name" placeholder="Enter Anime Name" />
            <button class="btn btn-outline dark:text-slate-100 dark:border-slate-100" type="submit">Search</button>
        </form>
    </div>
    <div class="m-12">
        <div class="grid md:grid-cols-5 grid-cols-2 sm:grid-cols-3 gap-6">
            @if (isset($animeData))
                @foreach ($animeData as $anime)
                    <div class="card bg-base-100 dark:bg-slate-700 dark:text-white shadow-xl">
                        <figure>
                            <img class="aspect-square" src="{{ $anime['images']['jpg']['image_url'] }}" alt="" />
                        </figure>
                        <div class="m-4">
                            <div class="mb-2">
                                <h1 class="badge text-xs font-semibold">{{ $anime['type'] }}</h1>
                            </div>
                            <h2 class="card-title">{{ $anime['title'] }}</h2>
                            <h5 class="card-title">{{ $anime['title_japanese'] }}</h5>
                            <p class="textContainer dark:text-slate-300">{{ $anime['synopsis'] }}</p>
                            <div class="card-actions justify-end flex items-end">
                                <button class="btn btn-primary">Watch</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>



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
</x-nav-layout>