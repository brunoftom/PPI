<?php
require "usuarios.php";

if (isset($_POST["dpEmail"]) && isset($_POST["dpSenha"])) {
    $email = $_POST["dpEmail"];
    $senha = $_POST["dpSenha"];

    $arrayContatos = carregaContatosDeArquivo();

    foreach ($arrayContatos as $contato) {
        if ($contato->email === $email && password_verify($senha, $contato->senhaHash)) {
            header("Location: sucesso.html");
            exit();
        }
    }

    header("Location: loginUsuario.html");
    exit();
} else {
    echo "Erro: e-mail ou senha não enviados.";
}
?>
