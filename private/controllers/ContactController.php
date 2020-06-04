<?php

namespace Website\Controllers;

/**
 * Class ContactController
 *
 * Deze handelt de logica van de homepage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class ContactController {

	public function showContactForm() {

		$template_engine = get_template_engine();
		echo $template_engine->render( 'contact_form' );

	}

	public function handleContactForm() {

		$from_name       = $_POST['from_name'];
		$from_email      = filter_var( $_POST['from_email'], FILTER_VALIDATE_EMAIL );
		$contact_message = $_POST['contact_message'];

		if ( $from_email === false ) {
			echo "Email is fout";
			exit;
		}

		$mailer = getSwiftMailer();

		$message = createEmailMessage( 'h.braun@ma-web.nl', 'Contact form van de website', $from_name, $from_email );

		$template_engine = get_template_engine();

		$data            = [
			'message' => $message,
			'from_name' => $from_name,
			'from_email' => $from_email,
			'contact_message' => $contact_message,
		];

		$html            = $template_engine->render( 'email', $data );

		$message->setBody( $html, 'text/html' );
		$message->addPart( "Bericht van " . $from_name . ': ' . $contact_message, 'text/plain' );

		$aantal_verstuurd = $mailer->send( $message );

		echo "Bedankt uw bericht is verstuurd";

	}

}

