<?php

namespace Website\Controllers;

/**
 * Class ContactController
 *
 * Deze handelt de logica van contact formulier af
 */
class ContactController {

	public function contactForm() {

		$temmplate_engine = get_template_engine();
		echo $temmplate_engine->render('contact_form');

	}

	public function handleContactForm() {

		echo "Hier wordt het contact formulier afgehandeld";

	}


}