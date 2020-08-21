<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>PicNGeek</title>
</head>

<body>
    
    <?php
    include "conexao_picngeek.php";
     session_start(); 
    
     if(!isset($_SESSION['carrinho']))
     {
         $_SESSION['carrinho'] = array();
     }
     
    $id_prod=$_GET['id_prod'];
    $i = 0;
    foreach ($_SESSION['carrinho'] as $key)
    {
	   if($key == $id_prod)
       {
           unset ($_SESSION['carrinho'][$i]);
	   echo "<script type='text/javascript'>alert('O produto foi removido com sucesso!')</script>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=menuprod.php'>";	
       }
        $i++;
    }
  

    
    ?>
</body>
</html>