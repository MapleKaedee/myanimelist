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
        $animeName = $request->input('anime_name'); // Assuming the input name is 'anime_name'
        $apiUrl = 'https://api.jikan.moe/v4/anime?q=' . urlencode($animeName);

        try {
            $specificAnime = $this->Anime();
            $response = Http::get($apiUrl);
            $animeData = $response->json()['data'];

            return view('search.search', compact('animeData', 'specificAnime'));
        } catch (\Exception $e) {
            // Handle errors, e.g., redirect back with an error message
            return redirect()->back()->with('error', 'Failed to fetch anime data.');
        }
    }
    public function showAnime($animeId)
    {
        try {
            $apiUrl = 'https://api.jikan.moe/v4/anime/' . $animeId .'/full'; // Menggunakan ID anime dalam URL
            $response = Http::get($apiUrl);

            if ($response->successful()) {
                $animeData = $response->json();

                // Lakukan sesuatu dengan $animeData, misalnya menampilkan ke view
                return view('search.details', compact('animeData'));
            } else {
                return redirect()->back()->with('error', 'Failed to fetch anime data. API returned an error.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to fetch anime data. Please try again later.');
        }
    }
}
