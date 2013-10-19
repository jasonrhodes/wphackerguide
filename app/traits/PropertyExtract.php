<?php

namespace app\traits;

trait PropertyExtract {
    
    /**
     * An object version of PHP's core extract() function.
     * This version pulls out all the elements of a hash and pushes them
     * onto the object using $this->$key = $value syntax.
     * 
     * @param array $properties The hash of properties
     * @param array $modifier A list of callbacks to pass keys/values through if you want to modify, say to remove a prefix, etc
     * @param boolean $ifExists Defaults to true, run every key in the hash through property_exists and only assign if the property was declared on the object
     * 
     * @return null
     */
    protected function extract($properties, $modifiers = [], $ifExists = true) {
        foreach ((array) $properties as $key => $value) {
            
            if (!empty($modifiers['key']) && is_callable($modifiers['key'])) {
                $key = $modifiers['key']($key, $value);
            }
            if (!empty($modifiers['value']) && is_callable($modifiers['value'])) {
                $value = $modifiers['value']($key, $value);
            }

 
            if (!$ifExists || ($ifExists && property_exists($this, $key))) {
                $this->$key = $value;
            }
        }
    }
    
}