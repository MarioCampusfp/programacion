<?php
class cuentaBancaria{
    public $titular;
    public $saldo;
    public $tipodeCuenta;

    public function depositar($cantidad){
        $this->saldo=$this->saldo+$cantidad;
    }
    public function retirar($cantidad){
        $this->saldo=$this->saldo-$cantidad;
    }
    public function mostrarInfo(){
        echo "el titular de la cuenta es ",$this->titular," el titular tiene una cuenta del tipo ",$this->tipodeCuenta," y tiene un saldo de ",$this->saldo,"\n";
    }
}
$cuenta=new cuentaBancaria;
$cuenta->titular="mario del rey";
$cuenta->saldo=3742.56;
$cuenta->tipodeCuenta="oro";
$cuenta->depositar(1000);
$cuenta->depositar(500);
$cuenta->retirar(900,96);
$cuenta->mostrarInfo();