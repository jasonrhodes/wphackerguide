<?php

echo __DIR__;

require dirname(__DIR__) . "/HikerCommand.php";


function _manually_load_plugin() {
	require dirname( __FILE__ ) . '/../hikerquotes.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require getenv( 'WP_TESTS_DIR' ) . '/includes/bootstrap.php';

