<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    public function Anime()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.jikan.moe/v4/anime/41514');
        $data = json_decode($response->getBody(), true);

        $specificAnime = $data['data'];
        return $specificAnime;
    }

    public function getAnime(Request $request)
    {
        $animeName = $request->input('anime_name');
        $apiUrl = 'https://api.jikan.moe/v4/anime?q=' . urlencode($animeName);

        $specificAnime = $this->Anime(); // Assuming this function gets specific anime data

        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $animeData = $response->json()['data'];
            return view('search.search', compact('animeData', 'specificAnime'));
        }
    }
    public function showAnime($animeId)
    {
        $apiUrl = 'https://api.jikan.moe/v4/anime/' . $animeId; // Menggunakan ID anime dalam URL
        $response = Http::get($apiUrl);
        // $response -> successful();
        // $animeData = $response->json();

        if ($response->successful()) {
            $animeData = $response->json();

            // Lakukan sesuatu dengan $animeData, misalnya menampilkan ke view
            return view('search.Details', compact('animeData'));
        }
        // dd($animeData);

        return redirect()->back()->with('error', 'Failed to fetch anime data. API returned an error.');
    }
}
