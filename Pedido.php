<?php

require_once("Prato.php");

class Pedido
{
    private string $nomeCliente;
    private string $nomeGarcom;
    private Prato $prato;



    public function getNomeCliente(): string
    {
        return $this->nomeCliente;
    }


    public function setNomeCliente(string $nomeCliente): self
    {
        $this->nomeCliente = $nomeCliente;

        return $this;
    }


    public function getNomeGarcom(): string
    {
        return $this->nomeGarcom;
    }


    public function setNomeGarcom(string $nomeGarcom): self
    {
        $this->nomeGarcom = $nomeGarcom;

        return $this;
    }


    public function getPrato(): Prato
    {
        return $this->prato;
    }

    public function setPrato(Prato $prato): self
    {
        $this->prato = $prato;

        return $this;
    }
    public function __toString()
    {
        return "O cliente $this->nomeCliente, foi atendido pelo garçom $this->nomeGarcom, pediu um prato de".
        $this->prato->getNome(). "no valor de R$ " . $this->prato->getValor()."";
    }
  
}   
