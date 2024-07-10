<?php

namespace App\Http\Controllers;

use App\Services\GoogleSearchService;
use Illuminate\Http\Request;

class GoogleSearchController extends Controller
{
    protected $googleSearchService;

    public function __construct(GoogleSearchService $googleSearchService)
    {
        $this->googleSearchService = $googleSearchService;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        // dd($query);
        if (empty($query)) {
            return redirect()->route('google.search')->with('message', 'Please enter some text.');
        }
        $results = $this->googleSearchService->search($query);

        return view('dashboard.google_search', compact('results'));
    }
}
