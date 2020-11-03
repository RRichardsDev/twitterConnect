<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index($showId)
    {
    	$tvShow = $this->getSummary($showId);
    	return view('summary')->with('tvShow', $tvShow);
    }
    public function getSummary($showId)
    {
    	$endpoint = "https://www.episodate.com/api/show-details";
		$client = new \GuzzleHttp\Client();

		$ID = $showId;
		$response = $client->request('GET', $endpoint, ['query' => [
		    'q' => $ID, 		    
		]]);

		$statusCode = $response->getStatusCode();
		$response = json_decode($response->getBody(), true);
		$tvShow = $response['tvShow'];
		return $tvShow;
    }
}
