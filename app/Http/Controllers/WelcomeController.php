<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

    	$tvShows = $this->getPopular();
    	return view('welcome')->with('tvShows', $tvShows);

    }


    public function getPopular()
    {
    	$endpoint = "https://www.episodate.com//api/most-popular";
		$client = new \GuzzleHttp\Client();
		$page = 1;

		$response = $client->request('GET', $endpoint, ['query' => [
		    'page' => $page, 		    
		]]);

		$statusCode = $response->getStatusCode();
		$response = json_decode($response->getBody(), true);
		$tvShows = $response['tv_shows'];
		return $tvShows;
    }
}        
