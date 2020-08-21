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
                <h1> Suas compras </h1>
                <?php
                include "conexao.php";
                session_start();

                if((!isset ($_SESSION['login']) == true) and    (!isset ($_SESSION['senha']) == true))
                {
                    unset($_SESSION['login']);
                    unset($_SESSION['senha']);
                    header('location:index.php');
                }
 
                $login = $_SESSION['login'];
                $senha = $_SESSION['senha'];
        
                $sql_usu = "select * from usuario where login='{$login}' and senha='{$senha}' and excluido='n';";
                $resultado_usu =pg_query($conecta,$sql_usu);
                $linha_usu=pg_num_rows($resultado_usu);
                $linha_result_usu=pg_fetch_array($resultado_usu);
                $id=$linha_result_usu['id_usuario'];
    
                $sql_compra = "select * from compra where id_usuario = '{$id}' and excluido='n';";
                $resultado_compra = pg_query ($conecta, $sql_compra);
                $linha_compra = pg_num_rows ($resultado_compra);
                $linha_compra_result = pg_fetch_array ($linha_compra);
                $id_compra=$linha_compra_result['id_comp'];
      
                $sql1="select * from picngeek.item_comprado ic inner join picngeek.produto p on ic.id_prod=p.id_prod where ic.id_comp='{$id_compra}';";
                $resultado1=pg_query($conecta, $sql1);
                $linha1=pg_num_rows($resultado1);
                
                
                for ($cont=0; $cont<$linha1; $cont++)
                {
                    echo "duda";
                    if ($linha1>0)
                    {
                    $linha11=pg_fetch_array($resultado1);
                    $id_prod = $linha11['id_prod'];
                    echo $id_prod;
                    echo "ID do produto ".$linha11['id_prod'];
                    echo "<br> <br> <br>";
                    echo "Nome ".$linha11['nome'];
                    echo "<br> <br> <br>";
                    echo "Preço ".$linha11['preco'];
                    echo "<br> <br> <br>";
                    echo "Dimensão ".$linha11['dimensao'];
                    echo "<br> <br> <br>";
                    echo "Imagem ".$linha11['imagem'];
                    echo "<br> <br> <br> <br> <br> <br>";
                        
                    }
                    
                }
            
                echo "<a href='seusdados.php'> Voltar </a><br><br>";
                pg_close($conecta);
    
            ?>
            </div>

            <?php include "footer.html" ?>

        </div>
    </center>
</body>

</html>
