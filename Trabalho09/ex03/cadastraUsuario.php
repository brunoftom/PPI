<?php
require "usuarios.php";

if (isset($_POST["dpEmail"]) && isset($_POST["dpSenha"])) {
    $email = $_POST["dpEmail"];
    $senha = $_POST["dpSenha"];

    if (!empty($email) && !empty($senha)) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $novoContato = new Usuario($email, $senhaHash);
        $novoContato->AddToFile("usuarios.txt");

        header("Location: listaUsuarios.php");
        exit();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
} else {
    header("Location: novoUsuario.html");
    exit();
}
?>
