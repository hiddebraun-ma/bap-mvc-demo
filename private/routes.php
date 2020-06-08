<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace( 'Website\Controllers' );

SimpleRouter::group( [ 'prefix' => site_url() ], function () {

	// START: Zet hier al eigen routes
	// Lees de docs, daar zie je hoe je routes kunt maken: https://github.com/skipperbent/simple-php-router#routes

	SimpleRouter::get( '/', 'WebsiteController@home' )->name( 'home' );

	// Routes naar de registratie functionaliteit
	SimpleRouter::get( '/registreren', 'RegistrationController@registrationForm' )->name( 'register.form' );
	SimpleRouter::post( '/registreren/verwerken', 'RegistrationController@handleRegistrationForm' )->name( 'register.handle' );
	SimpleRouter::get( '/registreren/bedankt', 'RegistrationController@registrationThankYou' )->name( 'register.thankyou' );
	SimpleRouter::get( '/registreren/bevestigen/{code}', 'RegistrationController@confirmRegistration' )->name( 'register.name' );

	SimpleRouter::get( '/privacy-statement', 'WebsiteController@privacyStatement' )->name( 'privacy' );

	// Login routes
	SimpleRouter::get( '/login', 'LoginController@loginForm' )->name( 'login.form' );
	SimpleRouter::post( '/login/verwerken', 'LoginController@handleLoginForm' )->name( 'login.handle' );
	SimpleRouter::get( '/logout', 'LoginController@logout' )->name( 'logout' );

	SimpleRouter::get( '/ingelogd/dashboard', 'LoginController@userDashboard' )->name( 'login.dashboard' );
	SimpleRouter::get( '/stuur-test-email', 'EmailController@sendTestEmail' )->name( 'email.test' );
	SimpleRouter::get('/bekijk-test-email', 'EmailController@viewTestEmail')->name('email.view');

	SimpleRouter::get( '/blogs', 'BlogController@blogIndex' )->name( 'blog.index' );
	SimpleRouter::get( '/blogs/{id}', 'BlogController@blogDetail' )->name( 'blog.detail' );

	SimpleRouter::get('/contact-formulier', 'ContactController@showContactForm')->name('contact.form');
	SimpleRouter::post('/contact/versturen', 'ContactController@handleContactForm')->name('contact.handle');

	SimpleRouter::post('/zoeken', 'SearchController@search')->name('search');

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

