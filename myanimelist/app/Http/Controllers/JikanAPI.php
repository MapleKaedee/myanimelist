<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class JikanAPI extends Controller
{
    public function anime()
    {
        $client = new Client();
        $response = $client->request('GET', getenv('URL_BASE') . '/top/anime');
        $data = json_decode($response->getBody()->getContents(), true);

// Assuming the structure is something like $data['anime'] => [{ 'title': 'Anime Title 1' }, { 'title': 'Anime Title 2' }, ...]
        foreach ($data['data'] as $anime) {
            $title = $anime['title'];
            $image = $anime['images']['jpg']['image_url'];
            $type = $anime['type'];
            $genres = $anime['genres'][0]['name'];
            $producers = $anime['producers'][0]['name'];
            $episodes = $anime['episodes'];
            $season = $anime['season'];
            $year = $anime['year'];
            $animeTitles[] = $title;
            $animeImage[] = $image;
            $animeType[] = $type;
            $animeGenres[] = $genres;
            $animeProducers[] = $producers;
            $animeEpisodes[] = $episodes;
            $animeSeason[] = $season;
            $animeYear[] = $year;
       
        }
        return view
            ('home.coba',
            ['animeTitles' => $animeTitles], ['animeImage' => $animeImage], ['animeType' => $animeType], ['animeGenres' => $animeGenres]
            , ['animeProducers' => $animeProducers], ['animeEpisodes' => $animeEpisodes], ['animeSeason' => $animeSeason], ['animeYear' => $animeYear]);

    }

    // iki nek nduwur wes tak pilihke seng dinggo, tinggal apply nek blade

    public function animeseason()
    {
        $client = new Client();
        $response = $client->request('GET', getenv('URL_BASE') . '/seasons/2023/fall');
        $data = json_decode($response->getBody()->getContents(), true);

        foreach ($data['data'] as $anime) {

            $title = $anime['title'];
            $animeTitles[] = $title;
        }
        dd($animeTitles);
    }
}
