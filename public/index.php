<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require('site/wp-blog-header.php');

$app = new \Slim\Slim();
$twig_loader = new Twig_Loader_Filesystem(dirname(__DIR__) . '/app/templates');
$template = new Twig_Environment($twig_loader);

$app->get("/", function () use ($template) {
	echo $template->render("index.html.twig");
});

$app->get("/quote", function () use ($template) {
	$quote = \app\models\WPObject::find([
		'post_type' => 'quotes',
		'posts_per_page' => 1,
		'orderby' => 'rand'
	]);
	$quote = array_shift($quote);
	echo $template->render("quote.html.twig", ['quote' => $quote]);
});

$app->get("/:word", function ($word) use ($template) {
	echo $template->render("index.html.twig", ['word' => $word]);
});

$app->run();