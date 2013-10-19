<?php

/**
 * Plugin Name: Some Cool Plugin
 * Author: Jason Rhodes
 */

namespace Rhodes\SomeCoolPlugin;

trait CreatePosts {

    public function create_content_type($options) {
        // For now we'll just return a fake success message
        return "You just created a new content type, with TRAITS, called " . $options["type"] . ' booo';
    }

}

class RandomClass {

    use \Rhodes\SomeCoolPlugin\CreatePosts;

    public function __construct($options) {
        $this->content_type_message = $this->create_content_type($options);
    }

    public function print_message() {
        echo $this->content_type_message;
    }

}

add_action('plugins_loaded', function () {
    $object = new RandomClass([ "type" => "Location" ]);

    $someObject = new \SomePlugin\SomeClass();
    
});


// add_action('init', [ $object, "print_message" ]);