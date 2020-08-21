<?php
    include "conexao_picngeek.php";
    $email = $_POST['email'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $excluido = 'n';
    $sql = "select * from usuarioadm where login='{$login}' and excluido='n';";
    $resultado = pg_query($conecta, $sql);
    $linhas = pg_affected_rows($resultado);
    if($linhas>0)
    {
        
        echo "<script type='text/javascript'>alert('O administrador já está cadastrado!')</script>";
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=criaAdm.php'>";
        
    }
    else 
    {
        $sql2 = "insert into usuarioadm values (DEFAULT, '$email', '$login', '$senha', '$excluido');";
        $resultado2 = pg_query($conecta, $sql2);
        $linhas2 = pg_affected_rows($resultado2);
        if($linhas2>0)
        {
            echo "<script type='text/javascript'>alert('Cadastro efetuado com sucesso!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=xxxx.php'>";
        }
        else 
        {
            echo "<script type='text/javascript'>alert('Erro ao cadastrar administrador')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=criaAdm.php'>";   
        }
    }
?>