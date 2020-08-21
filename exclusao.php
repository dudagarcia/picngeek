<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pic N Geek</title>
    <link rel="shortcut icon" type="image/x-icon" href="media/logo.ico" />
</head>

<body>
    <?php
        include "conexao.php";
        session_start();
        
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.php');
        }
        
        $login = $_SESSION['login'];
        $senha = $_SESSION['senha'];
            
        $sql4="select * from usuario where login = '{$login}' and senha = '{$senha}' and excluido='n';";
        $resultado4=pg_query($sql4);
        $linha4=pg_num_rows($resultado4);
        $linha44=pg_fetch_array($resultado4);
        $id=$linha44['id_usuario'];
        
        $data=date('d/m/Y'); 
        
        $sql="update clientes set excluido = 's', data_exclusao = '{$data}' where id_usuario = '{$id}';";
        $resultado=pg_query($conecta,$sql);
        $qtde=pg_affected_rows($resultado);
    
         $sql1="update usuario set excluido = 's', data_exclusao = '{$data}' where id_usuario = '{$id}';";
        $resultado1=pg_query($conecta,$sql1);
        $qtde1=pg_affected_rows($resultado1);
    
        $sql2="update endereco set excluido = 's', data_exclusao = '{$data}' where id_usuario = '{$id}';";
        $resultado2=pg_query($conecta,$sql2);
        $qtde2=pg_affected_rows($resultado2);
    
        
        if ($qtde > 0  && $qtde1 > 0 && $qtde2>0)
        {
            echo "<script type='text/javascript'>alert('Cadastro excluído!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
        }
        else
        {
            echo "<script type='text/javascript'>alert('Erro na exclusão !!!')</script>";
            echo "<a href='confirmaExclusao.php'>Voltar</a>";
        }
    ?>
</body>

</html>
