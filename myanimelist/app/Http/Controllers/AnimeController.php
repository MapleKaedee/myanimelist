<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class AnimeController extends Controller
{
    public function Anime(){
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





