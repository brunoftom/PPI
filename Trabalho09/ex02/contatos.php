<?php

class Contato
{
  public $nome;
  public $email;
  public $cpf;
  public $endereco;
  public $bairro;
  public $cidade;
  public $estado;

  function __construct($nome, $email, $cpf, $endereco, $bairro, $cidade, $estado)
  {
    $this->nome = $nome;
    $this->email = $email;
    $this->cpf = $cpf;
    $this->endereco = $endereco;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
    $this->estado = $estado;
  }

  public function AddToFile($arquivo)
  {
    // Abre o arquivo de texto para escrita de conteúdo no final
    $arq = fopen($arquivo, "a");

    // Neste exemplo os dados são armazenados de maneira simplificada,
    // no formato textual com campos separados por ponto-e-vírgula.
    fwrite($arq, "\n{$this->nome};{$this->email};{$this->cpf};{$this->endereco};{$this->bairro};{$this->cidade};{$this->estado}");

    // Fecha o arquivo de texto.
    fclose($arq);
  }
}

// Carrega as informações dos contatos do arquivo de texto
// e retorna um array de objetos correspondente
function carregaContatosDeArquivo()
{
  $arrayContatos = null;
  
  // Abre o arquivo clientes.txt para leitura
  $arq = fopen("clientes.txt", "r");
  if ( !$arq )
    return null;

  // Le os dados do arquivo, linha por linha, e armazena no vetor $contatos
  while (!feof($arq)) {
    // fgets lê uma linha de texto do arquivo
    $contato = fgets($arq); 
    
    // Separa dados na linha utilizando o ';' como separador
    list($nome, $email, $cpf, $endereco, $bairro, $cidade, $estado) = array_pad(explode(';', $contato), 7, null);

    // Cria novo objeto representado o contato e adiciona no final do array
    $novoContato = new Contato($nome, $email, $cpf, $endereco, $bairro, $cidade, $estado);
    $arrayContatos[] = $novoContato;
  }
      
  // Fecha o arquivo
  fclose($arq);  
  return $arrayContatos;
}

?>