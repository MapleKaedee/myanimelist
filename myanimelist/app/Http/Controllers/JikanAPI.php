<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class JikanAPI extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', getenv('URL_BASE') . '/top/anime');
        $data = json_decode($response->getBody(), true);

        if (!empty($data) && isset($data['data'])) {
            $animeList = $data['data']; // Assuming 'data' contains the list of anime

            // Loop through each anime and retrieve the title
            foreach ($animeList as $anime) {
                $title = $anime['title'];
                echo "Title: $title <br>";
            }
        } else {
            echo "No data found or unexpected data structure";
        }

    }

}
