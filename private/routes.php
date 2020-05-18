<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace( 'Website\Controllers' );

SimpleRouter::group( [ 'prefix' => site_url() ], function () {

	// START: Zet hier al eigen routes
	// Lees de docs, daar zie je hoe je routes kunt maken: https://github.com/skipperbent/simple-php-router#routes

	SimpleRouter::get( '/', 'WebsiteController@home' )->name( 'home' );

	// Registratie
	SimpleRouter::get( '/registreren', 'RegistrationController@registrationForm' )->name( 'register.form' );
	SimpleRouter::post( '/registreren/verwerken', 'RegistrationController@handleRegistrationForm' )->name( 'register.handle' );
	SimpleRouter::get( '/registreren/bevestigen/', 'RegistrationController@confirmRegistration' )->name( 'register.confirm' );

	// Kaart met markers
	SimpleRouter::get( '/op-de-kaart', 'MapController@showMap' )->name( 'map' );
	SimpleRouter::get( '/op-de-kaart/data', 'MapController@getJsonData' )->name( 'map.json' );

	// Contact formulier
	SimpleRouter::get( '/contact', 'ContactController@contactForm' )->name( 'contact.form' );
	SimpleRouter::get( '/contact/versturen', 'ContactController@handleContactForm' )->name( 'contact.handle' );

	// Login - Logout
	SimpleRouter::get( '/login', 'LoginController@loginForm' )->name( 'login.form' );
	SimpleRouter::post( '/login/verwerken', 'LoginController@handleLoginForm' )->name( 'login.handle' );
	SimpleRouter::get( '/logout', 'LoginController@logout' )->name( 'logout' );

	// STOP: Tot hier al je eigen URL's zetten

	SimpleRouter::get( '/not-found', function () {
		http_response_code( 404 );

		return '404 Page not Found';
	} );

} );


// Dit zorgt er voor dat bij een niet bestaande route, de 404 pagina wordt getoond
SimpleRouter::error( function ( Request $request, \Exception $exception ) {
	if ( $exception instanceof NotFoundHttpException && $exception->getCode() === 404 ) {
		response()->redirect( site_url() . '/not-found' );
	}

} );

