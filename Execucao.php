<?php

require_once("modelo/Prato.php");
require_once("modelo/Pedido.php");


$prato1 = new Prato;
$prato1->setNumero(1);
$prato1->setNome("Camarão à Milanesa");
$prato1->setValor(110, 00);

$prato2 = new Prato;
$prato2->setNumero(2);
$prato2->setNome("Pizza Margherita");
$prato2->setValor(80, 00);

$prato3 = new Prato;
$prato3->setNumero(3);
$prato3->setNome("Macarrão à Carbonara");
$prato3->setValor(60, 00);

$prato4 = new Prato;
$prato4->setNumero(4);
$prato4->setNome("Bife à Parmegiana");
$prato4->setValor(75, 00);

$prato5 = new Prato;
$prato5->setNumero(5);
$prato5->setNome("Risoto ao Funghi");
$prato5->setValor(70, 00);

$pratos = array($prato1, $prato2, $prato3, $prato4, $prato5);
$pedidos = [];

//MENU CADASTRAR

$opcao = null;

do {
   echo "\n\n-----MENU-----\n";
   echo "1-Cadastrar\n";
   echo "2-Cancelar\n";
   echo "3-Listar\n";
   echo "4-Total de Vendas\n";
   echo "0-Sair\n";

   $opcao = readline("\nInforme a opção:\n");

   echo "\n";

   switch ($opcao) {
      case 0:

         echo "Programa encerrado!\n";
         
         break;

      case 1:
         echo "\n-----CADASTRO-----\n";
         $pedido = new Pedido();
         $pedido->setNomeCliente(readline("Me diga seu Nome:"));
         $pedido->setNomeGarcom(readline("Me diga o nome do Garçom:"));
         $numeroPrato = readline("Diga o numero do Prato:");

         $pratoAchado = null;
         foreach ($pratos as $prato) {
            if ($prato->getNumero() == $numeroPrato) {
               $pratoAchado = $prato;
               break;
            }
         }
         if ($pratoAchado) {
            echo "Pedido cadastrado!!!";
            $pedido->setPrato($pratoAchado);
            $pedidos[] = $pedido;
         } else {
            echo "Informe um número válido!!!";
            
         }
         break;
         case 2:
            foreach ($pedidos as $key => $pedido) {
               echo $key + 1 . "° " . $pedido;
               
            }
            $pedidoCancelado = readline("\nFale o numero do pedido que você quer cancelar:\n");

            array_splice($pedidos, $pedidoCancelado - 1, 1);
            break;

            case 3:
               foreach ($pedidos as $key => $pedido) {
                  echo $key + 1 . "° " . $pedido;
                  
               } 
               
            case 4:
               
               $totalVendas = 0;
               foreach ($pedidos as $pedido) {
                  $totalVendas+=$pedido->getPrato()->getValor();
               }
               echo"Valor total de vendas: R$$totalVendas";


      }
   
} while ($opcao !=0);
