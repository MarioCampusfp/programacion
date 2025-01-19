<?php
class personaje{
    public $nombre;
    public $nivel;
    public $puntosVida;
    public $puntosAtaque;

    public function ataque(personaje $objetivo){
        $objetivo->puntosVida -= $this->puntosAtaque;
        if ($objetivo->puntosVida < 0) {
            $objetivo->puntosVida = 0;
        }
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
$jugado1=new personaje;
$jugado2=new personaje;
$jugado1->nombre="Gandalf";
$jugado1->nivel=1;
$jugado1->puntosVida=100;
$jugado1->puntosAtaque=50;
$jugado2->nombre="Frodo";
$jugado2->nivel=1;
$jugado2->puntosVida=100;
$jugado2->puntosAtaque=50;
$jugado1->ataque($jugado2);
echo "Frodo ha sido atacado por Gandalf, ahora tiene ".$jugado2->puntosVida." puntos de vida";
$jugado2->curarse();
echo "Frodo se ha curado, ahora tiene ".$jugado2->puntosVida." puntos de vida";
$jugado2->subirNivel();
echo "Frodo ha subido de nivel, ahora es nivel ".$jugado2->nivel." y tiene ".$jugado2->puntosVida." puntos de vida y ".$jugado2->puntosAtaque." puntos de ataque";
