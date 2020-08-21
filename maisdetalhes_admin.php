<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> Produto </title>
</head>
<body>
    <?php
        include "conexao_picngeek.php";
        $id_prod= $_GET["id_prod"];
        $sql="select * from produto where id_prod = $id_prod";
        $resultado= pg_query($conecta, $sql);
        $qtde=pg_num_rows($resultado);
        if ($qtde > 0)
        {
            for ($cont=0; $cont < $qtde; $cont++)
            {
                $linha=pg_fetch_array($resultado);
                echo "Código do produto...: ".$linha[id_prod]."<br>"; //ou $linha[0]
                echo $linha[nome]. "<br>";
                echo $linha[preco]."<br>";
                echo "Categoria...........: ".$linha[categoria]."<br>";
                echo "Dimensão............: ".$linha[dimensao]."<br>";
                echo "<img src=".$linha[imagem]."> <br>";
                echo "<a href='altera_prod.php?id_prod=$linha[0]'> Alterar </a> <br> <br>";
                echo "<a href='confirmaexclusao_prod.php?id_prod=$linha[0]'> Excluir </a><br><br>";
            }       
        }
        else
            echo "Não foi encontrado nenhum produto !!!<br><br>";
    ?>
</body>
</html>