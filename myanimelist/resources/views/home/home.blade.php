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
    <div class="m-12">
        <div class="flex justify-between items-center mb-4 dark:text-white">
            <h1 class="text-2xl font-bold align-middle">New Added</h1>
            <a class="btn btn-sm btn-outline btn-info dark:border-white dark:text-white" href="">Add New</a>
        </div>
        <div class="grid md:grid-cols-5 grid-cols-2 sm:grid-cols-3 gap-6">
            @foreach ($paginatedData as $anime)
                <div class="card bg-base-100 dark:bg-slate-700 dark:text-white shadow-xl">
                    <figure>
                        <img class="aspect-auto" src="{{ $anime['images']['jpg']['image_url'] }}" alt="" />
                    </figure>
                    <div class="m-4">
                        <div class="mb-2">
                            <h1 class="badge text-xs font-semibold">{{ $anime['genres'][0]['name'] }}</h1>
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
        <div class="join">
            @php
                $currentPage = $paginatedData->currentPage();
                $lastPage = $paginatedData->lastPage();
            @endphp

            <button class="join-item btn" onclick="window.location='{{ $paginatedData->url(1) }}'">1</button>
            <button class="join-item btn" onclick="window.location='{{ $paginatedData->url(2) }}'">2</button>

            @if ($currentPage > 3)
                <button class="join-item btn btn-disabled">...</button>
            @endif

            @for ($i = max(3, $currentPage - 1); $i <= min($currentPage + 1, $lastPage - 1); $i++)
                <button class="join-item btn {{ $i == $currentPage ? 'active' : '' }}"
                    onclick="window.location='{{ $paginatedData->url($i) }}'">{{ $i }}</button>
            @endfor

            @if ($currentPage < $lastPage - 2)
                <button class="join-item btn btn-disabled">...</button>
            @endif

            <button class="join-item btn"
                onclick="window.location='{{ $paginatedData->url($lastPage - 1) }}'">{{ $lastPage - 1 }}</button>
            <button class="join-item btn"
                onclick="window.location='{{ $paginatedData->url($lastPage) }}'">{{ $lastPage }}</button>
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
