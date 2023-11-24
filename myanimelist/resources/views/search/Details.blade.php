<head>
        <!-- ... CDN icon ... -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<style>
.rating {
    display: inline-block;
}

.star {
    font-size: 1.2em;
    color: #ccc; /* Warna bintang kosong */
    margin-right: 0.1em;
}

.star.filled {
  color: gold; /* Warna bintang terisi */
}

</style>

<x-nav-layout>
    <div class="m-12">
    @if (isset($animeData))
        @foreach ($animeData as $anime)
        <div class="grid grid-cols-3 gap-6">
            <div class="">
                <img class="rounded-sm" src="{{ $anime['images']['jpg']['large_image_url'] }}" alt="">
            </div>
            <div class="col-span-2">
                <h1 class="text-4xl font-bold dark:text-slate-100">{{ $anime['title'] }}</h1>
                <div class="grid grid-cols-4 mt-2">
                    <div class="grid dark:text-slate-200">
                        <div class="rating flex items-center">
                            @php
                                $rating = $anime['score'] / 2;
                            @endphp

                            @for ($i = 1; $i <= 5; $i++)
                                <span class="star {{ $i <= $rating ? 'filled' : '' }}">
                                    <i class="fas fa-star"></i>
                                </span>
                            @endfor

                            <div class="ml-2">
                                <h1 class="text-center">{{ $anime['score'] }} / 10</h1>
                            </div>


                        </div>
                        <div class="grid justify-items-center ">
                            <h1 class="">{{ $anime['scored_by'] }} Reviews</h1>
                        </div>
                    </div>
                    <div>

                    </div>
                    <div class="grid justify-items-center content-center dark:text-slate-200">
                        <h1>Rank <span class="text-bold">#{{ $anime['rank'] }}</span> </h1>
                    </div>
                    <div class="grid justify-items-end">
                        <button class="btn btn-primary"><i class="fas fa-plus p-1 rounded-sm bg-blue-100 text-primary"></i> Add To My List</button>
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-2">
                    <div>
                        <h1 class="text-xl font-semibold dark:text-slate-200">Genres</h1>
                    @foreach ($anime['genres'] as $genre)
                        <h1 class="mt-2 badge badge-outline dark:border-white dark:text-white text-xs font-semibold">{{ $genre['name'] }}</h1>
                    @endforeach
                    </div>
                    <div>
                        <h1 class="text-xl font-semibold dark:text-slate-200">Type</h1>
                        <h1 class="mt-2 text-xs font-semibold badge
                        @if ($anime['type'] == 'TV' )
                                badge-primary
                            @elseif ($anime['type'] == 'Movie' )
                                badge-secondary
                            @elseif ($anime['type'] == 'Special')
                                badge-accent text-white
                            @elseif ($anime['type'] == 'OVA' )
                                badge-info text-white
                            @endif
                        ">{{ $anime['type'] }}</h1>
                    </div>
                </div>
                <div class="mt-6">
                    <h1 class="text-xl font-semibold mb-2 dark:text-slate-200">Synopsis</h1>
                    <p class="text-sm text-slate-400">{{ $anime['synopsis'] }}</p>
                </div>
                <div class="mt-6">
                    <h1 class="text-xl font-semibold dark:text-slate-200">Information</h1>
                    <div class="grid grid-cols-2 dark:text-slate-200">
                        <div class="col-span-2 mt-2 ml-2">
                            <h1 class="font-semibold">Alternative Title</h1>
                            <div class="ml-2">
                                <p class="text-sm text-slate-400"><span class="text-black dark:text-slate-200 font-semibold">Synonyms :</span> {{ $anime['title_synonyms'][0] }}</p>
                                <p class="text-sm text-slate-400"><span class="text-black dark:text-slate-200 font-semibold">Japanese :</span> {{ $anime['title_japanese'] }}</p>
                                <p class="text-sm text-slate-400"><span class="text-black dark:text-slate-200 font-semibold">English :</span> {{ $anime['title_english'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
    @endif

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
