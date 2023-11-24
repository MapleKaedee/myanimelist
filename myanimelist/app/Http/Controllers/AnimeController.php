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

    public function fetchTopAnime()
    {
        $allTopAnime = [];

        // Define the number of pages you want to fetch
        $totalPages = 5; // Fetching 5 pages as an example

        for ($page = 1; $page <= $totalPages; $page++) {
            $response = Http::get('https://api.jikan.moe/v4/top/anime', [
                'page' => $page,
            ]);

            if ($response->successful()) {
                $topAnime = $response->json();
                $allTopAnime = array_merge($allTopAnime, $topAnime); // Merge results from each page
            } else {
                // Handle error if the request was not successful
                return response()->json(['error' => 'Failed to fetch data'], $response->status());
            }
        }
        dd($allTopAnime);
        return $allTopAnime;
    }

}
