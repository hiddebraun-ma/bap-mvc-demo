<?php

namespace Website\Controllers;

/**
 * Class SearchController
 *
 */
class SearchController {

	public function search() {

		$zoekTerm   = trim( $_POST['zoekterm'] );
		$zoekColumn = trim( $_POST['zoek_column'] );

		$geldigeZoekColumns = [ 'titel', 'content', 'auteur' ];
		if ( ! in_array( $zoekColumn, $geldigeZoekColumns ) ) {
			echo "Ongeldige kolom om in te zoeken";
			exit;
		}

		$blogs = searchBlogs( $zoekTerm, $zoekColumn );

		$template_engine = get_template_engine();
		echo $template_engine->render( 'blog_index', [ 'blogs' => $blogs, 'zoekopdracht' => $zoekTerm ] );

	}


}

