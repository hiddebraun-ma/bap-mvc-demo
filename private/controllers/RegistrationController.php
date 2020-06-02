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

				// Verificatie code
				$code = md5( uniqid( rand(), true ) );

				createUser( $result['data']['email'], $result['data']['wachtwoord'], $code );

				// Mail versturen met verificatie link + code
				sendConfirmationEmail($result['data']['email'], $code);

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


	public function confirmRegistration( $code ) {
		// Hier moeten we de code gaan lezen

		// Gebruiker ophalen bij die code
		$user = getUserByCode($code);
		if( $user === false){
			echo "Onbekende gebruiker of al bevestigd?";
			exit;
		}

		// Gebruiker activeren: code leegmaken in de database table
		confirmAccount($code);

		// Bevestigings pagina tonen
		$template_engine = get_template_engine();
		echo $template_engine->render( "register_confirmed" );

	}

}

