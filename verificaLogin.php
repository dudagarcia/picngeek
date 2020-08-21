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
        $login = strtolower($_POST['login']);
        $senha = $_POST['senha'];
	$senha=md5($senha);
        $sql = "select * from usuario where login = '{$login}' and excluido='n'";
        $resultado= pg_query($conecta, $sql);
        $linhas=pg_affected_rows($resultado);
        if ($linhas > 0)
        {
            $sqll = "select * from usuario where senha = '{$senha}' and excluido='n'";
            $resultadoo= pg_query($conecta, $sqll);
            $linhass=pg_affected_rows($resultadoo);
            if ($linhass>0)
            {
                echo "<script type='text/javascript'>alert('Login efetuado com sucesso!')</script>";
                $_SESSION['login'] = $login;
                $_SESSION['senha'] = $senha;
                header('location:seusdados.php');
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=seusdados.php'>";
            }
            else 
            {
                echo "<script type='text/javascript'>alert('A senha está incorreta!')</script>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
            }
        }
        else 
        {
            $sq = "select * from picngeek.usuarioadm where login ='{$login}'";
            $result = pg_query($conecta, $sq);
            $lin = pg_affected_rows($result);
            if($lin>0)
            {
                $sqq = "select * from picngeek.usuarioadm where senha ='{$senha}'";
                $resultt = pg_query($conecta, $sqq);
                $linn = pg_affected_rows($resultt);
                if($linn>0)
                {
                    echo "<script type='text/javascript'>alert('Login efetuado com sucesso!')</script>";
                    $_SESSION['login'] = $login;
                    $_SESSION['senha'] = $senha;
                    header('location:seusdados.php');
                    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=seusdados.php'>";
                }
                else 
                {
                    echo "<script type='text/javascript'>alert('A senha está incorreta!')</script>";
                    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
                }
            }
            else
            {
                echo "<script type='text/javascript'>alert('O login não está cadastrado!')</script>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
            }
            
        }
        pg_close($conecta);
    ?>
</body>

</html>
