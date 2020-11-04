<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Thujohn\Twitter\Facades\Twitter;

class twitterController extends Controller
{
	public function login()
	{
		$sign_in_twitter = true;
		$force_login = false;
		// Make sure we make this request w/o tokens, overwrite the default values in case of login.
		\Twitter::reconfig(['token' => '', 'secret' => '']);

		$token = \Twitter::getRequestToken(route('twitter.callback'));
		if (isset($token['oauth_token_secret']))
		{
			$url = Twitter::getAuthorizeURL($token, $sign_in_twitter, $force_login);
			Session::put('oauth_state', 'start');
			Session::put('oauth_request_token', $token['oauth_token']);
			Session::put('oauth_request_token_secret', $token['oauth_token_secret']);

			return Redirect::to($url);
		}
		return dd('failed');
	}

	public function callback()
	{
		if (Session::has('oauth_request_token'))
	{
		$request_token = [
			'token'  => Session::get('oauth_request_token'),
			'secret' => Session::get('oauth_request_token_secret'),
		];

		// $request_token = [
		// 	'token'  => 'e5KWihWqZfECKrYsM4JjKHk8p',
		// 	'secret' => 'wDwMRRg2gA9Q2rf4dG7TT18fT7EoL8jDutjH7FN4DeWDbQFp6y',
		// ];
		\Twitter::reconfig($request_token);

		$oauth_verifier = false;

		if (request()->has('oauth_verifier'))
		{
			$oauth_verifier = request()->get('oauth_verifier');
			// getAccessToken() will reset the token for you
			$token = \Twitter::getAccessToken($oauth_verifier);
		}

		if (!isset($request_token['secret']))
		{
			// return Redirect::route('twitter.error')->with('flash_error', 'We could not log you in on Twitter.');
			dd('oauth_token_secret error');
		}

		$credentials = \Twitter::getCredentials();

		if (is_object($credentials) && !isset($credentials->error))
		{
			// dd($credentials, $token);
			// $credentials contains the Twitter user object with all the info about the user.
			// Add here your own user logic, store profiles, create new users on your tables...you name it!
			// Typically you'll want to store at least, user id, name and access tokens
			// if you want to be able to call the API on behalf of your users.

			// This is also the moment to log in your users if you're using Laravel's Auth class
			// Auth::login($user) should do the trick.

			Session::put('access_token', $token);
			Session::put('profile_date', [
				'name' 	=> $credentials->name,
				'id'	=> $credentials->id,
				'screen_name'	=> $credentials->screen_name,

			]);
			return Redirect::to('/')->with('flash_notice', 'Congrats! You\'ve successfully signed in!');
		}

		// return Redirect::route('twitter.error')->with('flash_error', 'Crab! Something went wrong while signing you up!');
		return dd('error');
	}
	}
	public function tweet(Request $request)
	{
		$message = $request->only('tweet');
		Twitter::postTweet(['status' => $message, 'format' => 'json']);
		return "success";
	}

	public function searchTweet(Request $request)
    {
    	$query = "#arrow";    	
    	$since = "2020-11-04";
		$until = "2020-11-03";

		$client = new \GuzzleHttp\Client(['base_uri' =>'https://api.twitter.com/1.1/search/tweets.json']);
		$token = 'AAAAAAAAAAAAAAAAAAAAAK49IQEAAAAAYdDNPwABQb7SgT%2BYCTNB04BNJBI%3DqNOxOtlBdMa30LpevnzpDea3zZjqQjC3ubavj5LSR9TRPaN0jT';
		$headers = ['Authorization' => 'Bearer ' . $token,];

		$searchQuery = $this->buildURI($query, $until, $since);
		// dd($searchQuery);

		$response = $client->request('GET', $searchQuery, ['headers' => $headers] );
		$response = json_decode($response->getBody(), true);
		$tweets = $response['statuses'];
		$tweets = $this->linkUser($tweets);
		$tweets = $this->twitterDate($tweets);
		return view('home')->with('tweets',$tweets);


    	// ------thujohn--------
    	// $query = $request->only('nav-search');
    	// $query = "until%3A2020-11-02%20since%3A2020-11-01%20the%20flash";
     //    $response =Twitter::getSearch(['q' => $query, 'count'=> 50]);

     //    $formattedTweets = $this->formatTweets($response->statuses);
     //    return view('home')->with('tweets', $response->statuses);
    }
    public function buildURI($query, $since, $until)
    {
		$query = str_replace(" ", "%20", $query);
		$query = str_replace("#", "%23", $query);
		$query = str_replace("@", "%40", $query);
		$since = "since%3A".$since;
		$until = "until%3A".$until;

		$searchQuery = '?q=' . $until . "%20" . $since . "%20" . $query;
		return $searchQuery;
    }
    public function twitterDate($tweets)
    {
    	for($i=0; $i<=(count($tweets)-1); $i++){
    		$tweets[$i]['created_at'] = Twitter::ago($tweets[$i]['created_at']);

    	}
    	return $tweets;
    }
    public function linkUser($tweets)
    {
    	for($i=0; $i<=(count($tweets)-1); $i++){
    		$tweets[$i]['user']['name'] = '<a class= "text-Otitle" target="_blank" href ="https://twitter.com/' . $tweets[$i]['user']['screen_name'] . '">' . $tweets[$i]['user']['name'] . '</a>';
    	}

    	return $tweets;
    }
}
