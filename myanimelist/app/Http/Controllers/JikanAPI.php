<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class JikanAPI extends Controller
{

    public function FetchAnime()
    {
        if (Cache::has('cachedAnimeData')) {
            return Cache::get('cachedAnimeData');
        }

        $client = new Client();
        $allAnime = [];
        $currentPage = 1;
        $lastPage = 10;

        while ($currentPage <= $lastPage) {
            $response = $client->request('GET', 'https://api.jikan.moe/v4/top/anime?page=' . $currentPage);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $data = json_decode($response->getBody(), true);
                $allAnime = array_merge($allAnime, $data['data']);
                $currentPage++;

                if ($lastPage === null) {
                    $lastPage = $data['pagination']['last_visible_page'];
                }
                usleep(300000); // Delay 300ms before making the next request
            } else {
                Log::error('Failed to fetch data from API');
                return response('Failed to fetch data from API', $statusCode);
            }
        }

        Cache::put('cachedAnimeData', $allAnime, Carbon::now()->addMinutes(60));
        return $allAnime;
    }

    public function Anime()
    {
        // Mendapatkan data anime
        $allAnime = $this->FetchAnime();

        // Melakukan pagination
        $perPage = 10; // Jumlah anime per halaman
        $currentPage = request()->input('page', 1); // Mendapatkan halaman saat ini dari URL parameter

        $pagedData = array_slice($allAnime, ($currentPage - 1) * $perPage, $perPage);

        $paginatedData = new LengthAwarePaginator(
            $pagedData,
            count($allAnime),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return $paginatedData;

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
        $paginatedData = $this->Anime();
        $specificAnime = $this->getAnime();
        // $allAnime = $this->FetchAnime();
        return view('home.home')
            ->with('paginatedData', $paginatedData)
            // ->with('allAnime', $allAnime)
            ->with('specificAnime', $specificAnime);
    }
}
