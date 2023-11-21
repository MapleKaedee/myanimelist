<x-nav-layout>
    {{-- HERO START --}}
    <div class="m-12">
        <h1 class="mb-4 text-2xl font-bold dark:text-white">Trending Now</h1>
        <div class="rounded-md hero bg-slate-50 dark:bg-slate-600 shadow-md dark:text-white">
            <div class="hero-content flex-col lg:flex-row">
                <img src="{{ $specificAninme['images']['jpg']['image_url'] }}" class="h-64 rounded-lg shadow-2xl" />
                <div>
                    <div class="flex gap-2 my-2">
                        <h1 class="badge badge-outline">{{ $specificAninme['genres'][0]['name'] }}</h1>
                    </div>
                    <h1 class="text-5xl font-bold">{{ $specificAninme['title'] }}</h1>
                    <p class="py-6">{{ $specificAninme['synopsis'] }}</p>
                    <a
                        class="btn bg-blue-600 dark:bg-slate-700 hover:dark:bg-slate-300 hover:dark:text-slate-700 text-white">Watch
                        Now!</a>
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
                <div class="card bg-base-100 dark:bg-slate-700 dark:text-white shadow-xl">
                    <figure>
                        @foreach ($anime['images'] as $imageType => $image)
                            @if ($imageType === 'jpg')
                                <img class="aspect-auto" src="{{ $image['image_url'] }}"
                                    alt="{{ $image['large_image_url'] }}" />
                            @endif
                        @endforeach

                    </figure>

                    <div class="m-4">
                        <div class="mb-2">
                            @foreach ($anime['genres'] as $genre)
                                <h1 class="badge text-xs font-semibold">{{ $genre['name'] }}</h1>
                            @endforeach
                        </div>
                        <h2 class="card-title">{{ $anime['title'] }}</h2>
                        <p class="textContainer dark:text-slate-300">{{ $anime['synopsis'] }}</p>
                        <div class="card-actions justify-end flex items-end">
                            <button class="btn btn-primary">Watch</button>
                        </div>
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
            container.innerHTML = limitedText;
        });
    </script>
</x-nav-layout>
