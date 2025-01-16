<?php
class tarea{
    public $nombre;
    public $descripcion;
    public $fechaLimite;
    public $estado;

    public function marcarComoCompletado(){
        $this->estado="completado";
    }
    public function editardescripcion(){
        
        $this->descripcion = readline("increse la descripcion de la tarea: ");
        
    }
    public function mostrarTarea(){
        echo "la tarea ",$this->nombre," que consiste en ",$this->descripcion," tiene de fecha limite ",$this->fechaLimite," y su estado actual es de ",$this->estado,"\n";
    }
}

$tarea= new tarea;
$tarea->nombre="limpiar";
$tarea->fechaLimite="16/1/2025";
$tarea->editardescripcion();
$tarea->marcarComoCompletado();
$tarea->mostrarTarea();