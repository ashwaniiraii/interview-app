<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class GoogleSearchService
{
    protected $client;

    protected $apiKey;

    protected $searchEngineId;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('GOOGLE_API_KEY');
        $this->searchEngineId = env('GOOGLE_SEARCH_ENGINE_ID');
    }

    public function search($query)
    {
        $url = 'https://www.googleapis.com/customsearch/v1';
        $params = [
            'q' => $query,
            'key' => $this->apiKey,
            'cx' => $this->searchEngineId,
        ];

        // Log class name and method name
        Log::info('Class: '.__CLASS__);
        Log::info('Method: '.__METHOD__);
        Log::info('Google Search API Request URL: '.$url);
        Log::info('Google Search API Request Params: ', $params);

        $response = $this->client->get($url, ['query' => $params]);

        return json_decode($response->getBody(), true);
    }
}
