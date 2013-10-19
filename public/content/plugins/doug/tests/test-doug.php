<?php

class DougTest extends WP_UnitTestCase {

	public function setUp() {
		$this->doug = new DougAttribution();
	}

	public function testAddedDoug() {
		$string = "Hi.";
		$newString = $this->doug->add($string);
		$this->assertEquals($newString, "Hi. <span style='font-size: 50%'>—Douglas Adams</span>");
	}

}