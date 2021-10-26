<?php

include_once("conexao.php");

$arquivo = $_FILES["file"]["tmp_name"];
$nome = $_FILES["file"]["name"];

$ext = explode(".",$nome);

$extensao = end($ext);

if($extensao != "csv"){

    echo "extensao invalida";

}else{

    $objeto = fopen($arquivo, 'r'); // funcao de ler arquivo, o 'R' significa ler

    while(($dados = fgetcsv($objeto, 1000, ";")) !== FALSE){

        $valor_entrada = utf8_decode($dados[0]);
        $valor_porcentagem = utf8_decode($dados[1]);
        $vendas = utf8_decode($dados[2]);
        
      $result = $con->query("INSERT INTO dados (valor_entrada,valor_porcentagem,vendas)
         VALUES ('$valor_entrada','$valor_porcentagem','$vendas')");
    
    
    }
    
    if($result){
        echo "dados inseridos com sucesso";
    }else{
        echo "erro ao inserir os dados";
    }

}



















?>