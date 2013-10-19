<?php

/**
 * Plugin Name: App Bootstrap
 * Depends: Classes
 */

add_action('plugins_loaded', function () {
	$quotes = new WPPlugins\WPExtend\ContentType('quotes', [
	    'singular_name' => "Quote",
	    'supports' => ['editor', 'title', 'revisions', 'custom-fields', 'thumbnail']
	]);
});
