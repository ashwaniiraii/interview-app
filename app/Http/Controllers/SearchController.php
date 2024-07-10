<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $type = $request->input('type', 'all'); // 'all', 'photo', or 'video'

        $client = new Client();
        $apiKey = env('PIXABAY_API_KEY');
        $url = "https://pixabay.com/api/?key={$apiKey}&q=".urlencode($query)."&image_type={$type}";

        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        return view('dashboard.result', ['data' => $data]);
    }
}
