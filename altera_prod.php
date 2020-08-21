<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Altera dados</title>
</head>
<body>
    <?php
        include "conexao_picngeek.php";
        $id_prod = $_GET["id_prod"];
        $sql="select * from produto where id_prod = $id_prod";
        $resultado=pg_query($conecta,$sql);
        $qtde=pg_num_rows($resultado);
        if ( $qtde == 0 )
        {
            echo "Produto nao encontrado !!!<br><br>";
            exit;
        }
        $linha = pg_fetch_array($resultado);
    ?>
    <form action="grava_prod_alterado.php" id="formCad" method="post">
        Código do produto <input type="text" name="id_prod" 
        value="<?php echo $linha[id_prod]; ?>" readonly> <br>
       
        Nome do produto <input type="text" name="nome"
        value="<?php echo $linha[nome]; ?>"> <br>
         
        Quantidade em estoque <input type="text" name="qtde"
        value="<?php echo $linha[qtde_estoque]; ?>"> <br>
        
        Preço <input type="text" name="preco"
        value="<?php echo $linha[preco]; ?>"> <br>
        
        Categoria <input type="text" name="categ"
        value="<?php echo $linha[categoria]; ?>"> <br>
        
        Dimensão <input type="text" name="tam"
        value="<?php echo $linha[dimensao]; ?>"> <br>
        
        <input type="submit" value="Alterar produto!" id="botCadProd" name="subCad">
        
    </form>
</body>
</html>