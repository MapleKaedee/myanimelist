<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ListController extends Controller
{
    public function index()
{
    $client = new Client();
    $response = $client->request('GET', getenv('URL_BASE') . '/top/anime');
    $data = json_decode($response->getBody(), true);

    if (!empty($data) && isset($data['data'])) {
        $animeList = $data['data']; // Assuming 'data' contains the list of anime
        $titles = [];

        // Loop through each anime and retrieve the title
        foreach ($animeList as $anime) {
            $titles[] = $anime['title'];
        }

        return view('home.home', ['titles' => $titles, 'animeList' => $animeList]);
    } else {
        echo "No data found or unexpected data structure";
    }
}


    public function profile()
    {
        return view("profile.edit");
    }

    public function coba()
    {
        return view("home.coba");
    }
}
