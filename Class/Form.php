<?php

class Form{

    private $data;
    // public $surround = "div";

    public function __construct($data = array())
    {
        $this->data = $data;
    }


    // private function surround($html)
    // {
    //     return "<{$this->surround}>{$html}</{$this->surround}>";
    // }

    private function getValue($index)
    {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    public function input($name, $placeholder, $type, $value)
    {
        return ('<input type="' . $type . '" placeholder="' . $placeholder .'" type="text" name="' . $name . '" value="' . $value . '" class="forms-input"' . $this->getValue($name) . '">');
    } 

    public function submit($class, $name, $text)
    {
       return '<button class="' . $class . '"  name="'. $name .'" type="submit">' . $text . '</button>';
    }

    public function return($class, $name, $text, $link)
    {
       return '<button class="' . $class . '"  name="'. $name .'" type="submit"><a href="'. $link .'">' . $text . '</a></button>';
    }
}