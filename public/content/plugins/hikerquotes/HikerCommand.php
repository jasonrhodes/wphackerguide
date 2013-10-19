<?php

namespace hikerquotes;

use \WP_CLI;
use \WP_CLI_Command;

class HikerCommand extends WP_CLI_Command {

	/**
	 * Prints a greeting. Defaults to --draft=false.
	 *
	 * @synopsis --title=<string> --quote=<string> [--draft]
	 */
	public function add($args, $assoc_args) {

		$isValid = $this->validate($assoc_args);

		if ($isValid === true) {
			extract($assoc_args);
			wp_insert_post([
				"post_type" => "quotes",
				"post_title" => $title,
				"post_content" => $quote,
				"post_status" => !empty($draft) ? 'draft' : 'publish'
			]);
			WP_CLI::success("'$title' was successfully created");
		} else {
			WP_CLI::error($isValid);
		}
	}


	public function validate($args) {
		if (empty($args['title']) || is_numeric($args['title']) || in_array($args['title'], ['true', 'false'])) {
			return "'{$arts['title']}' is not a valid title.";
		}
		if (empty($args['quote']) || is_numeric($args['quote']) || in_array($args['quote'], ['true', 'false'])) {
			return "'{$args['quote']}' is not a valid quote.";
		}

		return true;
	}
	
}

WP_CLI::add_command("hiker", "hikerquotes\\HikerCommand");