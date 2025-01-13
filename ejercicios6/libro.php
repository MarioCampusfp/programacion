<?php
class libro{
    public $titulo;
    public $autor;
    public $numero_de_paginas;

    public function mostrarinfo(){
        echo"el titulo del libro es ", $this->titulo,"el autor del libro es ",$this->autor,"y tiene ",$this->numero_de_paginas," numero de paginas";
    }
};

