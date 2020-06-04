<?php

namespace Website\Controllers;

/**
 * Class EmailController
 *
 */
class EmailController {

	public function sendTestEmail() {

		$mailer = getSwiftMailer();

		$message = createEmailMessage( 'h.braun@ma-web.nl', 'Dit is een test e-mail', 'Hidde Braun', 'h.braun@ma-web.nl' );

		$template_engine = get_template_engine();
		$html            = $template_engine->render( 'email', [ 'message' => $message ] );

		$message->setBody( $html, 'text/html' );
		$message->addPart( "Dit is de tekst versie", 'text/plain' );

		$aantal_verstuurd = $mailer->send( $message );

		echo "Aantal = " . $aantal_verstuurd;

	}

	public function viewTestEmail() {

		$mailer  = getSwiftMailer();
		$message = createEmailMessage( 'h.braun@ma-web.nl', 'Dit is een test e-mail', 'Hidde Braun', 'h.braun@ma-web.nl' );

		$template_engine = get_template_engine();
		echo $template_engine->render( 'email', [ 'message' => null ] );

	}

}

