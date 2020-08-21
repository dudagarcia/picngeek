<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pic N Geek</title>
    <link rel="shortcut icon" type="image/x-icon" href="media/logo.ico" />
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <link rel="stylesheet" href="css/master.css">
    <?php include "header.php" ?>
</head>

<body>

    <center>
        <div class="mae" id="section1">

            <div id=secundario>
                <h1> Você pesquisou: [o que a pessoa digitou] </h1>
                <?php
        include "conexao.php";
        session_start();
        if((!isset ($_SESSION['login']) == true) and    (!isset ($_SESSION['senha']) == true))
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            /*header('location:index.php');*/
        }
 
            $login = $_SESSION['login'];
            $senha = $_SESSION['senha'];
        
        $produto = $_POST['busca'];
    
        $sql = "select * from picngeek.produtos where nome LIKE 
        '%{$produto}%'";
    
        $resultado=pg_query($conecta,$sql);
        $linhas=pg_affected_rows($resultado);
    
        if ($linhas>0) 
        {  
            
            $linha=pg_fetch_array($resultado);
            $pro = $linha['nome'];
          
            
             echo "<a href='menuprod.php?name=$linha[0]'>
           <br>$pro</a><br><br>";
        }
        else
        {
             echo "<script type='text/javascript'>alert('Nome do produto não encontrado!')</script>";
             echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=menuprod.php'>";
        }
             pg_close($conecta);
    ?>

            </div>
            <?php include "footer.html" ?>
        </div>
    </center>
</body>

</html>
