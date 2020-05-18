<?php

namespace Website\Controllers;

/**
 * Class MapController
 *
 * Deze handelt de logica van het inloggen en uitloggen af
 *
 */
class MapController {

	public function showMap() {

		$template_engine = get_template_engine();
		echo $template_engine->render('map');

	}

	public function getJsonData() {

		echo "Hier wordt de JSON terug gegeven voor de kaart";

	}


}