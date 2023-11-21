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

        $animeTitles = [];

// Assuming the structure is something like $data['anime'] => [{ 'title': 'Anime Title 1' }, { 'title': 'Anime Title 2' }, ...]
        foreach ($data['data'] as $anime) {
            $title = $anime['title'];
            $animeTitles[] = $title;
        }
        // dd($animeTitles);
        return view('home.coba', ['animeTitles' => $animeTitles]);
// Now $animeTitles will contain an array of anime titles
        // dd($animeTitles);
        // dd($animeTitles);
    }
    // )

}
