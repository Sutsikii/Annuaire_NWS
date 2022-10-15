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

    public function input($name, $placeholder)
    {
        return ('<input placeholder="' . $placeholder .'" type="text name="' . $name . '" value="" class="forms-input"' . $this->getValue($name) . '">');
    } 

    public function submit($class)
    {
       return '<button class="' . $class . '" type="submit">Envoyer</button>';
    }
}