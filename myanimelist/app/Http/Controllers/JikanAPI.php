<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class JikanAPI extends Controller
{
    public function anime()
    {
        $client = new Client();
        $response = $client->request('GET', getenv('URL_BASE') . '/seasons/now');
        $data = json_decode($response->getBody()->getContents(), true);

        if (!empty($data) && isset($data['data'])) {
            $animeList = $data['data'];
            $animes = [];

            // Loop through each anime and retrieve the data
            foreach ($animeList as $anime) {
                $animes[] = [
                    'title' => $anime['title'],
                    'synopsis' => $anime['synopsis'],
                    'images' => $anime['images'],
                    'type' => $anime['type'],
                    'genres' => $anime['genres'],
                    'producer' => $anime['producers'][0]['name'],
                    'episodes' => $anime['episodes'],
                    'season' => $anime['season'],
                    'year' => $anime['year'],
                ];
            }

            return $animes;
        }
        return [];
    }
    public function getAnime()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.jikan.moe/v4/anime/41514');
        $data = json_decode($response->getBody(), true);

        $specificAnime = $data['data'];
        return $specificAnime;
    }

    public function showView()
    {
        $animes = $this->anime();
        $specificAnime = $this->getAnime();

        return view('home.home')
            ->with('animes', $animes)
            ->with('specificAnime', $specificAnime);
    }
}
