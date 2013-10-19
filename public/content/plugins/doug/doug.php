<?php
/*
Plugin Name: Doug
Version: 0.1-alpha
Description: PLUGIN DESCRIPTION HERE
Author: YOUR NAME HERE
Author URI: YOUR SITE HERE
Plugin URI: PLUGIN SITE HERE
Text Domain: doug
Domain Path: /languages
*/

class DougAttribution {
	public function add($content) {
		return $content . " <span style='font-size: 50%'>—Douglas Adams</span>";
	}
}

$doug = new DougAttribution();

// add_filter('attr_doug', array($doug, "add"));