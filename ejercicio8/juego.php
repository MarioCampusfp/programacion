<?php
class personaje{
    public $nombre;
    public $nivel;
    public $puntosVida;
    public $puntosAtaque;

    public function ataque(personaje $objetivo){
        
    }
    public function curarse(){
        $this->puntosVida=$this->puntosVida+20;
    }
    public function subirNivel(){
        $this->nivel=$this->nivel+1;
        $this->puntosVida=$this->puntosVida+40;
        $this->puntosAtaque=$this->puntosAtaque+30;
    }
}