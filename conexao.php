<?php

    $host = "localhost";
    $user = "Felipe";
    $passwd = "Flima---0978*";
    $banco = "todo_list";

    $conexao = new mysqli($host, $user, $passwd, $banco);

    if($conexao->connect_error){
        die("Erro na conexão".$conexao->connect_error);
    }
?>