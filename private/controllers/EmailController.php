<?php

namespace Website\Controllers;

/**
 * Class EmailController
 *
 */
class EmailController {

	public function sendTestEmail(  ) {

		$mailer = getSwiftMailer();

		$message = createEmailMessage('donald@trump.com', 'Dit is een test e-mail', 'Hidde Braun', 'h.braun@ma-web.nl');
		$message->setBody('Dit is de inhoud van mijn test bericht!');

		$aantal_verstuurd = $mailer->send($message);

		echo "Aantal = " . $aantal_verstuurd;

	}

}

