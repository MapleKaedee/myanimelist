@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body class="m-12">
    <div class="grid grid-cols-5">
        <div class="card bg-base-100 shadow-xl">
            @foreach ($animeImage as $anime)
                <figure><img src={{ $anime }} alt="gambar card" /></figure>
            @endforeach
            <div class="m-4">
                <div class="badge badge-warning text-xs font-semibold">Action</div>
                <h2 class="card-title">Bofuri</h2>
                @foreach ($animeTitles as $anime)
                    <li>{{ $anime }}</li>
                @endforeach

                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Watch</button>
                </div>
            </div>
        </div>
    </div>
    <div>
        <p>Anime
            <a href=https://api.jikan.moe/v4/anime/1/characters_staff>aa</a>
        </p>
    </div>
</body>

</html>
