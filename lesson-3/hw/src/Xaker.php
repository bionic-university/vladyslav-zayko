<?php

class Xaker
{

    private $victim;

    public function __construct($name)
    {
        if (empty($name)) {
            trigger_error("Enter class name to crack!", E_USER_ERROR);
        }

        $className = ucfirst(strtolower($name));
        $this->victim = new $className;
    }

    public function crack()
    {
        if ($this->victim instanceof Item) {
            return $this->victim->crack();
        } else {
            trigger_error("Wrong class name", E_USER_ERROR);
        }
    }
}