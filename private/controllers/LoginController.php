<?php

namespace Website\Controllers;

/**
 * Class LoginController
 *
 * Deze handelt de logica van het inloggen en uitloggen af
 *
 */
class LoginController {

	public function loginForm() {

		$template_engine = get_template_engine();
		echo $template_engine->render('login_form');

	}

	public function handleLoginForm() {

		echo "Hier wordt de gebruiker ingelogd";

	}

	public function logout() {

		echo "Hier wordt de gebruiker uitgelogd";

	}

}