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
		//return Redirect::route('twitter.error');
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


		// dd($request_token);
		\Twitter::reconfig($request_token);


		$oauth_verifier = false;
		// dd($request_token);

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


			return Redirect::to('/home')->with('flash_notice', 'Congrats! You\'ve successfully signed in!');
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
}
