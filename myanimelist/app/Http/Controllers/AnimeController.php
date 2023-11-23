<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    public function getAnime(Request $request)
    {
        $animeName = $request->input('anime_name'); // Assuming the input name is 'anime_name'
        $apiUrl = 'https://api.jikan.moe/v4/anime?q=' . urlencode($animeName);

        try {
            $response = Http::get($apiUrl);
            $animeData = $response->json()['data'];

            return view('search.search', compact('animeData'));
        } catch (\Exception $e) {
            // Handle errors, e.g., redirect back with an error message
            return redirect()->back()->with('error', 'Failed to fetch anime data.');
        }
    }
}
