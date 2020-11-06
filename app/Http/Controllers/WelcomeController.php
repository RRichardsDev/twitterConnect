<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
    	$alphabetLower = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
    	$alphabet = array("B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

    	$tvShows = $this->getPopular();
    	return view('welcome')->with('tvShows', $tvShows)->with('alphabet', $alphabet);

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
