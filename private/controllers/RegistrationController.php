<?php

namespace Website\Controllers;

/**
 * Class RegistrationController
 *
 * Deze handelt het registreren van gebruikers af
 */
class RegistrationController {

	public function registrationForm() {
		$template_engine = get_template_engine();
		echo $template_engine->render( 'register_form' );
	}

	public function handleRegistrationForm() {

		// Formulier gegevens valideren
		$result = validateRegistrationData( $_POST );

		if ( count( $result['errors'] ) === 0 ) {
			// Opslaan van de gebruiker

			if ( userNotRegistered( $result['data']['email'] ) ) {

				createUser( $result['data']['email'], $result['data']['wachtwoord'] );

				// Doorsturen naar de bedankt pagina
				$bedanktUrl = url( 'register.thankyou' );
				redirect( $bedanktUrl );

				// Alles hierna wordt niet meer uitgevoerd

			} else {
				//Anders foutmelding tonen
				$result['errors']['email'] = 'Dit account bestaat al';
			}

		}

		$template_engine = get_template_engine();
		echo $template_engine->render( 'register_form', [ 'errors' => $result['errors'] ] );

	}

	public function registrationThankYou() {

		$template_engine = get_template_engine();
		echo $template_engine->render( "register_thankyou" );

	}

}

