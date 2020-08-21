<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Altera dados</title>
</head>
<body>
    <?php
        include "conexao_picngeek.php";
        $id_prod=$_POST["id_prod"];
        $nome=$_POST["nome"];
        $qtde_estoque=$_POST["qtde"];
        $preco=$_POST["preco"];
        $categora=$_POST["categ"];
        $dimensao=$_POST["tam"];
        $sql="update produto set 
        nome = '$nome',
        preco = '$preco',
        categoria = '$categoria',
        dimensao = '$dimensao',
        qtde_estoque = '$qtde_estoque' 
        where id_prod = $id_prod";
        $resultado=pg_query($conecta,$sql);
        $qtde=pg_affected_rows($resultado);
        if ($qtde > 0)
        {
            echo "<script type='text/javascript'>alert('Gravação OK !!!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=mostra_prod.php'>";
        }
        else
            echo "<script type='text/javascript'>alert('Erro na alteração!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=mostra_prod.php'>";
    ?>
</body>
</html>