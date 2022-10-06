<?php

class Form{

    private $data;
    public $surround = 'p';

    public function __construct($data = array())
    {
        $this->data = $data;
    }


    private function surround($html)
    {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    public function input($name)
    {
        return $this->surround('<input type="text name="' . $name . '">', 'p');
    } 

    public function submit()
    {
       return $this->surround('<button type="submit">Envoyer</button>');
    }
}