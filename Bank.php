<?php

$clientes = [];
$contas   = [];

//Cliente que sempre existe
// $cliente = [
//     "nome" => "John Doe",
//     "cpf"  => "00000000000", //11 digitos
//     "telefone" => "(45)9999999999" //10 digitos
// ];

// $clientes[] = $cliente;


// $conta = [
//     "numeroConta" => uniqid(),
//     "cpfCliente" => "00000000000",
//     "saldo" => 0
// ];

// $contas[] = $conta;


function menu()
{

    global $clientes;
    global $contas;

    print "========== B A N C O ==========\n";
    print "[1]cadastrar\n";
    print "[2]contas\n";
    print "[3]depositar\n";
    print "[4]sacar\n";
    print "[5]saldo\n";
    print "===============================\n";

    $num = readline("Informe uma opção: ");

    switch ($num) {

        case 1:

            $nome = readline("Informe o seu nome:");
            $cpf = readline("Informe o seu cpf:");
            $telefone = readline("Informe o seu telefone:");

            cadastrarCliente($clientes, $nome, $cpf, $telefone);

            //print_r($clientes);

            menu();

            break;

        case 2:
            
            $cpf = readline("Informe o seu cpf:");

            cadastrarConta($contas, $cpf);
            print_r($contas);

            menu();

            break;

        case 3:
            //depositar($contas, $numeroConta, $quantia);
            break;
        case 4:
            //sacar($contas, $numeroConta, $quantia);
            break;
        case 5:
            //consultarSaldo($contas, $numeroConta);
            break;
    }
}

menu();


function cadastrarCliente(&$clientes, string $nome, string $cpf, string $telefone): void
{

    //global $clientes; //Alternativa para acesso de variáveis fora do escopo da função

    $cliente = [
        "nome" => $nome,
        "cpf"  => $cpf, //11 digitos
        "telefone" => $telefone //10 digitos
    ];

    $clientes[] = $cliente;
}
function cadastrarConta(&$contas, $cpfCliente): string
{

    $conta = [
        "numeroConta" => uniqid(),
        "cpfCliente" => $cpfCliente,
        "saldo" => 0
    ];

    $contas[] = $conta;

    return $conta['numeroConta'];
}

function depositar(&$contas, $numeroConta, $quantia)
{
    foreach ($contas as &$conta) {
        if ($conta['numeroConta'] == $numeroConta) {
            $conta['saldo'] += $quantia;
            print  "Depósito de R$ $quantia realizado com sucesso na conta $numeroConta";
            break;
        } else {
            print "Conta $numeroConta não encontrada.";
        }
    }
}

function sacar($contas, $numeroConta, $quantia)
{
    foreach ($contas as $conta) {
        if ($conta['numeroConta'] == $numeroConta) {
            $conta['saldo'] -= $quantia;
        } else {
            print "Conta $numeroConta não encontrada.";
        }
    }
}

function consultarSaldo(&$contas, $numeroConta)
{
    foreach ($contas as &$conta) {
        if ($conta['numeroConta'] == $numeroConta) {
            print "Saldo da conta {$numeroConta}: R${$conta['saldo']}";
        } else {
            print "Conta $numeroConta não encontrada.";
        }
    }
}

// cadastrarCliente($clientes, "Jefferson", "06800044455", "(45)99999999999");
// $numeroConta = cadastrarConta($contas, "06800044455");

// print_r($contas);
