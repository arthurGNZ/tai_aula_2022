<?php 
 $nome = $_GET["nome"];
 $telefone = $_GET["telefone"];
 $cpf = $_GET["cpf"];
 $dados= array(
     "nome"=>"$nome",
     "telefone"=>"$telefone",
     "cpf"=>"$cpf");
    header("Location: index.php?cpf=$cpf&telefone=$telefone&cpf=$cpf");
?>