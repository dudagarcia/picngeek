<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Exclusão lógica </title>
</head>
<body>
    <?php
        include "conexao_picngeek.php";
        $id_prod = $_GET["id_prod"];
        $data=date('d/m/Y'); //'Y' (maiúsculo) para ano com 4 dígitos
        $sql="update produto set excluido = 's', data_exclusao = '$data' where id_prod = $id_prod";
        //inserida a data de exclusao do produto para documentação
        $resultado=pg_query($conecta,$sql);
        $qtde=pg_affected_rows($resultado);
        if ($qtde > 0 )
        {
            echo "<script type='text/javascript'>alert('Produto excluído!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.html'>";
        }
        else
        {
            echo "<script type='text/javascript'>alert('Erro na exclusão!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=maisdetalhes_admin.php'>";
        }
    ?>
</body>
</html>