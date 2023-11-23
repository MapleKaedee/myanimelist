<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class JikanAPI extends Controller
{
    private function fetchAnime()
    {
        // Check if data is cached
        if (Cache::has('cachedAnimeData')) {
            return Cache::get('cachedAnimeData');
        }

        $client = new Client();
        $allAnime = [];
        $animeCount = 0;

        $currentPage = 1; // Halaman awal
        $lastPage = null;

        do {
            try {
                $response = $client->request('GET', 'https://api.jikan.moe/v4/top/anime?page=' . $currentPage);

                $statusCode = $response->getStatusCode();

                if ($statusCode == 200) {
                    $data = json_decode($response->getBody(), true);

                    // ... (proses data seperti sebelumnya)

                    // Masukkan data dari halaman saat ini ke dalam array semua anime
                    $allAnime = array_merge($allAnime, $data['data']);

                    // ...

                    // Tambahkan waktu tunggu sebelum melakukan permintaan berikutnya
                    usleep(300000); // Delay 300ms (3/10 detik) sebelum melakukan permintaan lagi

                    // ...

                    if ($animeCount < 200 && $data['pagination']['has_next_page']) {
                        $currentPage++; // Pindah ke halaman selanjutnya
                    }
                } else {
                    // Handle jika respons tidak berhasil
                    return response('Failed to fetch data from API', $statusCode);
                }
            } catch (RequestException $e) {
                Log::error('RequestException: ' . $e->getMessage());
                // Handle jika terjadi exception
                return response('Failed to fetch data from API: ' . $e->getMessage(), $e->getCode());
            } catch (Exception $e) {
                Log::error('Exception: ' . $e->getMessage());
                // Handle jika terjadi exception lainnya
                return response('Failed to fetch data from API: ' . $e->getMessage());
            }
        } while ($animeCount < 200 && $currentPage <= $lastPage);

        // Cache the fetched data for future use
        Cache::put('cachedAnimeData', $allAnime, Carbon::now()->addMinutes(60)); // Cache for 60 minutes

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

        return view('home.home')
            ->with('paginatedData', $paginatedData)
            ->with('specificAnime', $specificAnime);
    }
}
