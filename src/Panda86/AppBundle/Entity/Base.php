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
    public function setOptions(array $options)
    {
        $class_attr = get_object_vars($this);
        foreach($options as $key => $val)
        {
            $attr = $key;
            if(array_key_exists($attr, $class_attr))
            {
                $this->$attr = $val;
            }
        }
        return $this;
    }
}