<?php

namespace Website\Controllers;

/**
 * Class RegistrationController
 *
 * Deze handelt de logica van het registreren af
 * - Registratie formulier
 * - Afhandelen registratie formulier
 * - Afhandelen bevestigings link?
 */
class RegistrationController {

	public function registrationForm() {

		$temmplate_engine = get_template_engine();
		echo $temmplate_engine->render('register_form');

	}

	public function handleRegistrationForm() {

		echo "Hier wordt het registratie formulier afgehandeld";

	}

	public function confirmRegistration() {
		echo "Hier wordt de bevestigingslink met code afgehandeld en de gebruiker geactiveerd (als de code klopt)";
	}

}