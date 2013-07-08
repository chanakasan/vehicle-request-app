<?php

namespace Panda86\AppBundle\Entity;

class Base
{
    public function __construct(array $options = null)
    {
        if(is_array($options)) {
            $this->setOptions($options);
        }
    }

    /**
     * Set constructor options dynamically
     *
     * @param array $options
     * @return $this
     */
    protected function setOptions(array $options)
    {
        //$class_methods = get_class_methods(get_class());
        $attr = get_object_vars($this);
        foreach($options as $key => $val)
        {
            //$set_method = $this->_getSetMethod($key);
            if(array_key_exists($key, $attr))
            {
                $this->$key = $val;
            }
        }
        return $this;
    }

    protected function _getSetMethod($string)
    {
        $camelCase = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
        unset($string);
        return 'set'.$camelCase;
    }
}