<?php

namespace WPPlugins\WPExtend;

class ContentType {
    public $type;
    public $options = [];
    public $labels = [];

    /**
     * Creates a new ContentType object
     * @param string $type
     * @param array $options
     * @param array $labels
     */
    public function __construct($type, $options = [], $labels = []) {
        $this->type = $type;

        $default_options = [
            'public' => true,
            'supports' => ['title', 'editor', 'revisions', 'thumbnail']
        ];
        $required_labels = [
            'singular_name' => ucwords($this->type),
            'plural_name' => ucwords($this->type)
        ];

        $this->options = $options + $default_options;
        $this->labels = $labels + $required_labels;
        $this->options['labels'] = $labels + $this->default_labels();

        add_action('init', array($this, 'register'));
    }

    /**
     * Registers the content type using WP core function(s)
     * @return null
     */
    public function register() {
        register_post_type($this->type, $this->options);
    }

    /**
     * Creates intelligent default labels from the required singular and plural labels
     * @return array
     */
    public function default_labels() {
        
        return [
            'name' => $this->labels['plural_name'],
            'singular_name' => $this->labels['singular_name'],
            'add_new' => 'Add New ' . $this->labels['singular_name'],
            'add_new_item' => 'Add New ' . $this->labels['singular_name'],
            'edit' => 'Edit',
            'edit_item' => 'Edit ' . $this->labels['singular_name'],
            'new_item' => 'New ' . $this->labels['singular_name'],
            'view' => 'View ' . $this->labels['singular_name'] . ' Page',
            'view_item' => 'View ' . $this->labels['singular_name'],
            'search_items' => 'Search ' . $this->labels['plural_name'],
            'not_found' => 'No matching ' . strtolower($this->labels['plural_name']) . ' found',
            'not_found_in_trash' => 'No ' . strtolower($this->labels['plural_name']) . ' found in Trash',
            'parent_item_colon' => 'Parent ' . $this->labels['singular_name']
        ];
    
    }
}