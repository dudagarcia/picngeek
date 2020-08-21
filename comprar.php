<?php

   
    include "conexao.php";

    if((!isset ($_SESSION['login']) == true) and    (!isset ($_SESSION['senha']) == true))
    {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.php');
    }
    $login = $_SESSION['login'];
    $senha = $_SESSION['senha'];
	
	if(!isset($_SESSION['carrinho']))
    {
        $_SESSION['carrinho'] = array();
    }
    
    $sql = "select * from usuario where login = '{$login}' and senha = '{$senha}' and excluido='n';";
    $resultado= pg_query($conecta, $sql);
    $linhas_usu=pg_num_rows($resultado);
    $linha_usu=pg_fetch_array($resultado);
    
    $id_usuario=$linha_usu['id_usuario'];
    $preco_final=$_POST["preco_final"];
    $qtde_comprada=$_POST["qtde"];
    $linha_cont=$_POST["linha"];
    
    for($a=0; $a>count($linha_cont); $a++)
        
    {
        $sql_produto="insert into produto (qtde_estoque) values ($linha_cont[$a]['qtde_estoque']) where id_prod={'$linha_cont[$a]['id_prod]'};";
        $resultado_produto=pg_query($conecta, $sql_produto);
        $linhas_produto=pg_num_rows($resultado_produto);
        

        $sql_item_comprado="insert into item_comprado (id_comp, id_prod, qtde) values ($linha_cont[$a]['id_comp'], $linha_cont[$a]['id_prod'], $qtde_comprada) where id_comp = {$linha_cont[$a]['id_comp']};";
        $resultado_item_comprado=pg_query($conecta, $sql_item_comprado);
        $linhas_item_comprado=pg_num_rows($resultado_item_comprado);
        

        $sql_compra="insert into compra (id_comp, id_usuario, id_prod, preco_final, data_compra) values ($linha_cont[$a]['id_comp'], $id_usuario, $linha_cont[$a]['id_prod'], $preco_final, $data_compra);";
        $resultado_compra=pg_query($conecta, $sql_compra);
        $linhas_compra=pg_num_rows($resultado_compra);
    }
    
    if ($linhas_produto>0 && $linhas_item_comprado>0 && $linhas_compra>0)
    {
        echo "<script type='text/javascript'>alert('Compra realizada com sucesso!')</script>";
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=produtos.php'>";
    }

?>