<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Usuários Cadastrados</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Email</th>
                <th>Senha (Hash)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require "usuarios.php";
            $arrayContatos = carregaContatosDeArquivo();
            
            if (!empty($arrayContatos)) {
                foreach ($arrayContatos as $contato) {
                    if (!empty($contato->email) && !empty($contato->senhaHash)) {
                        echo "<tr><td>" . htmlspecialchars($contato->email) . "</td><td>" . htmlspecialchars($contato->senhaHash) . "</td></tr>";
                    }
                }
            } else {
                echo "<tr><td colspan='2'>Nenhum usuário cadastrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="index.html">Voltar à página inicial</a>
</div>

</body>
</html>
