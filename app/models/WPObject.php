<?php

namespace app\models;

class WPObject {

	use \app\traits\PropertyExtract;

	public $ID;
    public $title;
    public $content;
    public $status;
    public $type;
    public $date;

	public function __construct($wp_post_array) {

		$this->extract($wp_post_array, [
            'key' => function ($k, $v) { 
                return (substr($k, 0, 5) === "post_") ? substr($k, 5) : $k;
            }
        ]);

        $this->content = apply_filters('attr_doug', $this->content);
    }


    /**
     * Finds and creates WP objects using WP get_post and get_posts methods
     * 
     * @param  mixed $args Numeric ID or array of arguments
     * @return mixed       Single WP object or array of WP objects
     */
    public static function find($args) {

        if (is_numeric($args)) {

            return static::find_one($args);

        } else if (is_array($args)) {

            return static::find_many($args);
        }
    }

    /**
     * Handles creating a single post object
     *     
     * @param  int $id WordPress id
     * @return WPObject
     */
    protected static function find_one($id) {

        $object = get_post($id);
        $wpobject = new static($object);

        return $wpobject;
    }


    /**
     * Find a set of objects based on arguments
     * 
     * @param  array $args List of parameters for finding the object set
     * @return array       WPObject instances
     */
    protected static function find_many($args) {

        return array_map(function ($object) {

            return new static($object);

        }, get_posts($args));
    }


    /**
     * Create a new object
     * 
     * @param  array $data Object data
     * @return WPObject      Instance of WPObject tied to newly created WP object
     */
    public static function create($data) {
        unset($data['ID']);
        $object = static::find_one(wp_insert_post($data));

        return $object;
    }


    /**
     * Updates the existing object
     * 
     * @param  array $data
     * @return WPObject
     */
    public function update($data) {
        foreach ($data as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
        $data['ID'] = $this->ID;
        wp_update_post($data);

        return $this;
    }


    /**
     * Deletes instance
     * @return WPObject
     */
    public function delete() {
        wp_delete_post($this->ID);

        return $this;
    }

}