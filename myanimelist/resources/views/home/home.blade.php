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
                        class="btn bg-blue-600 dark:bg-slate-700 hover:dark:bg-slate-300 hover:dark:text-slate-700 text-white">See Details</a>
                </div>
            </div>
        </div>
    </div>
    {{-- HERO END --}}
    <div class="m-12">
        <div class="flex justify-between items-center mb-4 dark:text-white">
            <h1 class=" text-2xl font-bold align-middle">New Added</h1>
            <a class="btn btn-sm btn-outline btn-info dark:border-white dark:text-white" href="">Add New</a>
        </div>
        <div class="grid md:grid-cols-5 grid-cols-2 sm:grid-cols-3 gap-6">
            @foreach ($animes as $anime)
    <div class="card bg-base-100 dark:bg-slate-700 dark:text-white shadow-xl flex flex-col">
        <figure>
            @foreach ($anime['images'] as $imageType => $image)
                @if ($imageType === 'jpg')
                    <img class="h-80" src="{{ $image['image_url'] }}" alt="{{ $image['large_image_url'] }}" />
                @endif
            @endforeach
        </figure>

        <div class="m-4 flex-grow">
            <div class="mb-2">
                @foreach ($anime['genres'] as $genre)
                    <h1 class="badge badge-outline text-xs font-semibold">{{ $genre['name'] }}</h1>
                @endforeach
            </div>
            <h2 class="card-title text-md">{{ $anime['title'] }}</h2>
            <p class="textContainer text-sm dark:text-slate-300">{{ $anime['synopsis'] }}</p>
        </div>

        <div class="card-actions justify-end mb-4 mr-4">
            <button class="btn btn-primary">Details</button>
        </div>
    </div>
@endforeach


        </div>
    </div>



    <script>
        var textContainers = document.querySelectorAll('.textContainer');

        textContainers.forEach(function(container) {
            var originalText = container.innerHTML;
            var limitedText = originalText.substring(0, 50); // Ambil 50 karakter pertama
            var truncatedText = limitedText + (originalText.length > 50 ? '...' : '') // Tambahkan elipsis jika teks lebih dari 50 karakter
            container.innerHTML = truncatedText;
        });

        var textContainers = document.querySelectorAll('.textTitleContainer');

        textContainers.forEach(function(container) {
            var originalText = container.innerHTML;
            var limitedText = originalText.substring(0, 200); // Ambil 200 karakter pertama
            var truncatedText = limitedText + (originalText.length > 200 ? '...' : ''); // Tambahkan elipsis jika teks lebih dari 200 karakter
            container.innerHTML = truncatedText;
        });
    </script>
</x-nav-layout>
