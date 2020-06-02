<?php

namespace Website\Controllers;

/**
 * Class BlogController
 *
 */
class BlogController {

	public function blogIndex() {

		$blogs = getAllBlogs();

		$template_engine = get_template_engine();
		echo $template_engine->render( 'blog_index', [ 'blogs' => $blogs ] );

	}


	public function blogDetail($id) {

		$blog = getBlog($id);

		$template_engine = get_template_engine();
		echo $template_engine->render( 'blog_details', [ 'blogItem' => $blog ] );

	}

}

