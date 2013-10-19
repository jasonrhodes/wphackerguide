<?php

class HikerCommandTest extends WP_UnitTestCase {

	public function setUp() {
		$this->hiker = new \hikerquotes\HikerCommand();
	}

	public function testValidate() {
		$number = $this->hiker->validate(['title' => 'Anything', 'quote' => '55']);
		$this->assertEquals($number, "'55' is not a valid quote.");

		// $boolean = $this->hiker
	}
}

