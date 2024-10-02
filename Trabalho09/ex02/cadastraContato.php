<?php

require "contatos.php";

$nome = $_POST["dpNome"];
$email = $_POST["dpEmail"];
$cpf = $_POST["dpCPF"];
$endereco = $_POST["endEndereco"];
$bairro = $_POST["endBairro"];
$cidade = $_POST["endCidade"];
$estado = $_POST["endEstados"];

// Cria um novo objeto Contato com os dados do formulário
$novoContato = new Contato($nome, $email, $cpf, $endereco, $bairro, $cidade, $estado);
$novoContato->AddToFile("clientes.txt");

// redireciona o navegador para a página de listagem de contatos
header("location: listaContatos.php");
exit();

?>