<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $alphabet = array("B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
    	$search = $request->only('nav-search');
    	$search = $search['nav-search'];
    	$tvShows = $this->getSearch($search, false);
    	return view('search')->with('tvShows', $tvShows)->with('searchQuery', $search)->with('alphabet', $alphabet);
    }

    public function getSearch($search, $alpha)
    {
		$endpoint = "https://www.episodate.com//api/search";
		$client = new \GuzzleHttp\Client();
		$q= $search;
		$page = 1;

		
		$response = $client->request('GET', $endpoint, ['query' => [
			'q' => $search,
		    'page' => $page, 		    
		]]);
		

    	if($alpha === true){
    		$response = $response->getBody();
    		$found= false;
    		$page=1;
    		do{
    			$response = $client->request('GET', $endpoint, ['query' => [
					'q' => $search,
				    'page' => $page, 		    
				]]);
    		// $first = strtolower($response['tv_shows'][1]['name'][0]);
    			$alphaResponse = json_decode($response->getBody(), true);
    			// $count = (count($alphaResponse['tv_shows']) - 1);
    			$count = 0;
    			$first = $alphaResponse['tv_shows'][$count]['name'][0];
    			// dd($first);
    		// dd($response['tv_shows']);
    		// dd(strtolower($first) . strtolower($search));
    			if($first === $search){
    				// dd(1);
    				$found=true;
    				$response = json_decode($response->getBody(), true);
    				$tvShows = $response["tv_shows"];
					return $tvShows;
    				
    			}else{
    				$page=$page+1;
    		
    				$alphaResponse = $client->request('GET', $endpoint, ['query' => [
						'q' => $search,
					    'page' => $page, 		    
					]]);
					$alphaResponse = json_decode($alphaResponse->getBody(), true);
					$alphaTvShows = $alphaResponse['tv_shows'];
					// dd($page);
    			}
    			
    		}while($found==false);
    			return $alphaTvShows;
		}else{
			$response = json_decode($response->getBody(), true);
    		$tvShows = $response['tv_shows'];
				return $tvShows;
    	}

    }

    public function alpha($letter){
    	$search = $letter;
    	$tvShows = $this->getSearch($search, true);
    	return view('search')->with('tvShows', $tvShows)->with('searchQuery', $search);

    }
}