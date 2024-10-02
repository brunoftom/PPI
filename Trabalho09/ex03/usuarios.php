<?php

class Usuario
{
    public $email;
    public $senhaHash;

    function __construct($email, $senhaHash)
    {
        $this->email = $email;
        $this->senhaHash = $senhaHash;
    }

    public function AddToFile($arquivo)
    {
        $arq = fopen($arquivo, "a");
        fwrite($arq, "{$this->email};{$this->senhaHash}\n");
        fclose($arq);
    }
}

function carregaContatosDeArquivo()
{
    $arrayContatos = [];

    if (($arq = fopen("usuarios.txt", "r")) !== false) {
        while (($linha = fgets($arq)) !== false) {
            $linha = trim($linha);
            if (!empty($linha)) {
                list($email, $senhaHash) = explode(';', $linha);
                $novoContato = new Usuario($email, $senhaHash);
                $arrayContatos[] = $novoContato;
            }
        }
        fclose($arq);
    }
    return $arrayContatos;
}
?>
