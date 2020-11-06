<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datetime;

class SummaryController extends Controller
{
    public function index($showId)
    {
    	$tvShow = $this->getSummary($showId);
    	$tvShow['start_date'] = $this->dateToString($tvShow['start_date']);
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
		$tvShow = $this->formatTvShowData($tvShow);
		// dd($tvShow);
		return $tvShow;
    }

    public function formatTvShowData($tvShow)
    {
    	$episodeCount = count($tvShow['episodes']) - 1;
    	$season = 1;
    	$noOfSeasons = $tvShow['episodes'][$episodeCount]['season'];

    	for($i=1; $i<= $noOfSeasons; $i++ ){
    		$tvShow['seasons'][$i] = array();
    	}
    		//loops through all episodes
	    	for($i=0; $i <= $episodeCount; $i++){
	    		// echo "a:".$season;
	    		//reformats the date
	    		$date = new DateTime( $tvShow['episodes'][$i]['air_date'] );
	    		$date = $date->format('d M Y');
	    		$tvShow['episodes'][$i]['air_date'] = $date;

	    		//seperate episodes into seasons
	    		if($tvShow['episodes'][$i]['season'] === $season){
	    			array_push($tvShow['seasons'][$season], $tvShow['episodes'][$i]);
	    		}else{
	    			$season++;
    			}
    		}

	    // dd($season);
	
    	return $tvShow;
    }
    public function dateToString($date)
    {
    	$date = new DateTime( $date );
    	$date = $date->format('d M Y');

    	return $date;
    }

    public function formatDateToDateTime($date)
    {
    	$date = date_create_from_format('d M Y', $date);
    	$date->getTimestamp();
    	return $date;
    }

    public function splitSeasons()
    {
    	for($i=0; $i <= count($tvShow['episodes'])-1; $i++){

    		$date = new DateTime( $tvShow['episodes'][$i]['air_date'] );
    		$date = $date->format('d M Y');
    		$tvShow['episodes'][$i]['air_date'] = $date;
    	}
    	return $tvShow;
    }
}
