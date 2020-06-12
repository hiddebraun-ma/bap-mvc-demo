<?php

namespace Website\Controllers;

/**
 * Class LoginController
 *
 * Deze handelt het inloggen en uitloggen af
 */
class LoginController {

	public function loginForm() {

		$template_engine = get_template_engine();
		echo $template_engine->render( 'login_form' );
	}

	public function handleLoginForm() {

		// Form valideren: email en wachtwoord ingevuld?
		$result = validateRegistrationData( $_POST );

		// Checken: bestaat gebruiker met dat email wel?
		if ( userNotRegistered( $result['data']['email'] ) ) {
			$result['errors']['email'] = 'Deze gebruiker is niet bekend';
		} else {
			// Controleren of wachtwoord klopt (password_verify)
			$user = getUserByEmail( $result['data']['email'] );

			// Kijken of de gebruiker wel actief is (code is NULL)
			if ( is_null( $user['code'] ) ) {

				if ( password_verify( $result['data']['wachtwoord'], $user['wachtwoord'] ) ) {

					// Gebruiker inloggen
					loginUser( $user );

					// Gebruiker doorsturen naar een eigen dashboard (alleen ingelogde gebruikers)
					redirect( url( 'login.dashboard' ) );

				} else {
					$result['errors']['wachtwoord'] = 'Wachtwoord is niet correct';
				}
			} else {
				$result['errors']['email'] = 'Dit account is nog niet actief!';
			}
		}

		// Anders foutmeldingen tonen in het inlogformulier
		$template_engine = get_template_engine();
		echo $template_engine->render( 'login_form', [ 'errors' => $result['errors'] ] );
	}

	public function userDashboard() {

		// Checken of je wel echt bent ingelogd
		loginCheck();

		$template_engine = get_template_engine();
		echo $template_engine->render( 'user_dashboard' );

	}

	public function logout() {
		logoutUser();
		redirect( url( 'home' ) );
	}

	public function passwordForgottenForm() {

		$errors    = [];
		$mail_sent = false;

		if ( request()->getMethod() === 'post' ) {
			// Formulier afhandelen

			// Email checks
			$email = filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL );
			if ( $email === false ) {
				$errors['email'] = 'Geen geldig email adres opgegeven';
			}

			if ( count( $errors ) === 0 ) {
				// Kijken of email in de database staat
				$user = getUserByEmail( $email );
				if ( $user === false ) {
					$errors['email'] = 'Onbekend account';
				}
			}

			// Als er geen fouten zijn, reset mail versturen
			if ( count( $errors ) === 0 ) {
				sendPasswordResetEmail( $email );
				$mail_sent = true;
			}

		}

		$template_engine = get_template_engine();
		echo $template_engine->render( 'password_forgotten_form', [ 'errors' => $errors, 'mail_sent' => $mail_sent ] );
	}

	public function passwordResetForm( $reset_code ) {

		$errors = [];

		// Gebruiker ophalen die bij de reset code hoort
		$user = getUserByResetCode( $reset_code );
		if ( $user === false ) {
			echo "Ongeldige code";
			exit;
		}

		// Is het formulier opgestuurd met POST?
		if ( request()->getMethod() === 'post' ) {

			// Formulier checken (wachtwoord validatie)
			$password         = $_POST['password'];
			$password_confirm = $_POST['password_confirm'];

			if ( strlen( $password ) < 6 ) {
				$errors['password'] = 'Wachtwoord moet minstens 6 karakters lang zijn.';
			}

			if ( count( $errors ) === 0 ) {
				if ( $password !== $password_confirm ) {
					$errors['password'] = 'De wachtwoorden zijn niet gelijk.';
				}
			}

			// Nieuwe wachtwoord opslaan
			if ( count( $errors ) === 0 ) {

				$result = updatePassword($user['id'], $password);
				if($result === true){
					redirect(url('login.form'));
					// script stopt
				}else{
					$errors['password'] ='Er ging iets fout bij het opslaan van het wachtwoord';
				}

				// Gebruiker door sturen naar de login
			}

		}


		$template_engine = get_template_engine();
		echo $template_engine->render( 'password_reset_form', [ 'errors' => $errors, 'reset_code' => $reset_code ] );
	}


}

