<?php
class CuentaBancaria {
    private $titular;
    private $saldo;
    private $tipoCuenta;

    public function __construct($titular, $tipoCuenta) {
        $this->titular = $titular;
        $this->saldo = 0;
        $this->tipoCuenta = $tipoCuenta;
    }

    public function depositar($cantidad) {
        if ($cantidad > 0) {
            $this->saldo += $cantidad;
        }
    }

    public function retirar($cantidad) {
        if ($this->verificarSaldoSuficiente($cantidad)) {
            $this->saldo -= $cantidad;
        }
    }

    private function verificarSaldoSuficiente($cantidad) {
        return $this->saldo >= $cantidad;
    }

    public function getSaldo() {
        return $this->saldo;
    }
}

$cuenta = new CuentaBancaria("Juan Perez", "Ahorro");
$cuenta->depositar(1000);
echo "Saldo inicial: " . $cuenta->getSaldo() . "\n";
$cuenta->retirar(500);
$cuenta->retirar(600); // No debería permitir esta operación
echo "Saldo final: " . $cuenta->getSaldo() . "\n";
?>