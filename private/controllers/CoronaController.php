<?php

namespace Website\Controllers;

/**
 * Class CoronaController
 *
 */
class CoronaController {

	public function index() {

		$url = 'https://api.covid19api.com/countries';

		// HTTP Client aanmaken
		$client = new \GuzzleHttp\Client();

		// Request doen
		$response = $client->request( 'GET', $url );
		$json     = $response->getBody();

		// JSON omzetten in een array met json_decode()
		$countries = json_decode( $json, true );

		// Landen sorteren op alfabet
		usort($countries, function($a, $b){
			return strcmp($a['Country'], $b['Country']);
		});

		$template_engine = get_template_engine();
		echo $template_engine->render( 'corona_index', [ 'countries' => $countries ] );

	}


	public function countryDetails( $country ) {

		$url = 'https://api.covid19api.com/live/country/' . $country . '/status/confirmed';

		// HTTP Client aanmaken
		$client = new \GuzzleHttp\Client();

		// Request doen
		$response = $client->request( 'GET', $url );
		$json     = $response->getBody();

		// JSON omzetten in een array met json_decode()
		$data = json_decode( $json, true );

		$template_engine = get_template_engine();
		echo $template_engine->render( 'corona_country_details', [ 'stats' => $data ] );

	}


}

