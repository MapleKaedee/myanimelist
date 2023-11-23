<x-nav-layout>
    <div class="join">
        <form method="GET" action="{{ url('/search') }}">
            <input class="input input-bordered join-item" type="text" name="anime_name" placeholder="Enter Anime Name" />
            <button class="btn join-item rounded-r-full" type="submit">Search</button>
        </form>
    </div>
    <div class="m-12">
        <div class="grid md:grid-cols-5 grid-cols-2 sm:grid-cols-3 gap-6">
            @if (isset($animeData))
                @foreach ($animeData as $anime)
                    <div class="card bg-base-100 dark:bg-slate-700 dark:text-white shadow-xl">
                        <figure>
                            <img class="aspect-auto" src="{{ $anime['images']['jpg']['image_url'] }}" alt="" />
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
