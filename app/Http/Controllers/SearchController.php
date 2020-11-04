<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
    	$search = $request->only('nav-search');
    	$search = $search['nav-search'];
    	$tvShows = $this->getSearch($search);
    	return view('search')->with('tvShows', $tvShows)->with('searchQuery', $search);
    }

    public function getSearch($search)
    {
    	$endpoint = "https://www.episodate.com//api/search";
		$client = new \GuzzleHttp\Client();
		$q= $search;
		$page = 1;

		$response = $client->request('GET', $endpoint, ['query' => [
			'q' => $search,
		    'page' => $page, 		    
		]]);

		$statusCode = $response->getStatusCode();
		$response = json_decode($response->getBody(), true);
		$tvShows = $response['tv_shows'];
		return $tvShows;
    }
}