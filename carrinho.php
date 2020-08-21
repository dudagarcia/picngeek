<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> PicNGeek </title>
</head>
<body>
   
   <?php
    
    
    session_start(); 
    
     if(!isset($_SESSION['carrinho']))
     {
         $_SESSION['carrinho'] = array();
      }
    
     include "conexao_picngeek.php";
        
           
     $id_prod = $_GET["id_prod"];
        
        
        
     $_SESSION['carrinho'][] = $id_prod;
                        
     echo  $_SESSION['carrinho'][0];
      
     echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=testeCarrinho.php'>";
            

    ?>
    
</body>
</html>