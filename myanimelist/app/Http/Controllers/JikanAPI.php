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

        if (!empty($data) && isset($data['data'])) {
            $animeList = $data['data']; // Assuming 'data' contains the list of anime
            $titles = [];
            $synopsis = [];
            $image = [];
            $type = [];
            $genres = [];
            $producers = [];
            $episodes = [];
            $season = [];
            $year = [];

            // Loop through each anime and retrieve the title
            foreach ($animeList as $anime) {
                $titles[] = $anime['title'];
                $synopsis[] = $anime['synopsis'];
                $image[] = $anime['images']['jpg']['image_url'];
                $type[] = $anime['type'];
                $genres[] = $anime['genres'];
                $producers[] = $anime['producers'][0]['name'];
                $episodes[] = $anime['episodes'];
                $season[] = $anime['season'];
                $year[] = $anime['year'];
            }
            // dd($genres);
            return view('home.home', [
                'titles' => $titles, 'animeList' => $animeList, 'synopsis' => $synopsis, 'image' => $image, 'type' => $type, 'genres' => $genres, 'producers' => $producers, 'episodes' => $episodes, 'season' => $season, 'year' => $year,
            ]);
        }
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
