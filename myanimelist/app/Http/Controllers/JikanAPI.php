<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class JikanAPI extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', getenv('URL_BASE') . 'https://api.jikan.moe/v4');
        $data = json_decode($response->getBody(), true);
        dd($data);

    }

}
