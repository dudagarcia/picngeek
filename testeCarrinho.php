<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>PicNGeek</title>
</head>

<body>
    <form action="comprar.php">
    <?php
    include "conexao.php";
     session_start(); 
    
     if(!isset($_SESSION['carrinho']))
     {
         $_SESSION['carrinho'] = array();
     }

    $qtde = 0;
    $preco_total=0;
    $linhas = array();
    $cont = 0;
    foreach ($_SESSION['carrinho'] as $key)
    {
	   echo $key;
	   echo "<br> <br>";
        $sql="select * from produto where id_prod ='{$key}';";
        $resultado=pg_query($conecta, $sql);
        $linhas[$cont]=pg_num_rows($resultado);
        if ($linhas[$cont]>0)
        {
            $linha[$cont]=pg_fetch_array($resultado);
            //echo "CÃ³digo do produto...: ".$linha[id_prod]."<br>"; //ou $linha[0]
            echo "Nome................: ".$linha[$cont][nome]."<br>";
            echo "PreÃ§o...............: ".$linha[$cont][preco]."<br>";
            //echo "Categoria...........: ".$linha[$cont][categoria]."<br>";
            //echo "DimensÃ£o............: ".$linha[$cont][dimensao]."<br>";
            echo "<img src=".$linha[$cont][imagem]."> <br>";
            echo "<a href='produtos.php'> Voltar para a pÃ¡gina de produtos </a>"; 
 	        echo "Quantidade: <input type="text" maxlenght="2" name="quantidade" value="quantidade"> ";
            echo "<a href='removerCarrinho.php?id_prod=$key'> Remover produto do carrinho </a>";
        }
	
        $qtde_comprada=$_POST["quantidade"];
        if($linha[$cont]["qtde_estoque"] < qtde_comprada)
        {
            echo "<script type='text/javascript'>alert('Quantidade indisponível no estoque!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=testeCarrinho.php'>";	
        }
       $preco_total+=$linha[$cont][preco] * qtde_comprada;
        $cont++;
    }  
	
	   echo "preco total:";
	   echo $preco_total;
       echo "<br> <br>";
        echo"
        <input type='hidden' name='linha' value='".$linha."'>
        <input type='hidden' name='qtde_comprada' value='".$qtde_comprada."'>
        <input type='hidden' name='preco_final' value='".$preco_total."'>

        ";
   	  
    ?>
    </form>
</body>
</html>