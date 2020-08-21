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
    <script defer type="text/javascript" src="voltaraotopo.js"></script>
    <?php include "header.php" ?>
</head>

<body>

        <div class="mae" id="section1">



        <div class="container">


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
		
	       if(!isset($_SESSION['carrinho']))
     {
         $_SESSION['carrinho'] = array();
     }
        
            $sql = "select * from usuario where login = '{$login}' and senha = '{$senha}' and excluido='n';";
            $resultado= pg_query($conecta, $sql);
            $linhas=pg_num_rows($resultado);
            if ($linhas > 0) 
            {
                $linha=pg_fetch_array($resultado);
                
                
                $id=$linha['id_usuario'];
                
                $sql1="select * from cliente where id_usuario='{$id}' and excluido='n';";
                $resultado1=pg_query($conecta, $sql1);
                $linha1=pg_num_rows($resultado1);
                if ($linha1>0)
                {
                    
                    $linha1a=pg_fetch_array($resultado1);
                    $sql2="select * from endereco where id_usuario='{$id}' and excluido='n';";
                    $resultado2=pg_query($conecta, $sql2);
                    $linha2=pg_num_rows($resultado2);
                    ?>
                <?php
                    if ($linha2>0)
                    {
        
                        $linha2a=pg_fetch_array($resultado2);
                ?>
                <h1> DADOS DO CLIENTE </h1><hr>
                <div class="col-50">
                    <?php
                         
                         echo "<h2>Nome</h2>".$linha1a['nome'];
                         echo "<h2>Sobrenome</h2>".$linha1a['sobrenome'];
                         echo "<h2>Sexo</h2>".$linha1a['cpf'];
                         if ($linha1a['sexo'] == 'f')
                             echo "Feminino";
                         if ($linha1a['sexo'] == 'm')
                             echo "Masculino";
                         if ($linha1a['sexo'] == 'o')
                             echo "Não informado";
                         echo "<h2>Data de nascimento</h2>".$linha1a['data_nasc'];
                        echo "<h2>Celular</h2>".$linha1a['celular'];
                         echo "<h2>Telefone</h2>".$linha1a['telefone'];
                         echo "<h2>Login</h2>".$linha['login'];
                         echo "<h2>Email</h2>".$linha['email'];
                ?>
                </div>
                
                <div class="col-50">
                    <?php 
                         echo "<h2> Rua </h2>".$linha2a['endereco'];
                         echo "<h2> Número </h2>".$linha2a['numero'];
                         echo "<h2> Complemento </h2>".$linha2a['complemento'];
                         echo "<h2> Bairro </h2>".$linha2a['bairro'];
                         echo "<h2> CEP </h2>".$linha2a['cep'];
                         echo "<h2> Cidade </h2>".$linha2a['cidade'];
                         echo "<h2> Estado </h2>".$linha2a['estado'];
                         echo "<h2> País </h2>".$linha2a['pais'];
                    }
                ?>
                </div>
            
                         </div>
<center>
            <?php
                }
                
                echo "<a class='alterar' href='altera.php?id_usuario=$linha[0]'>Alterar</a>";
                echo "<a class='excluir' href='confirmaExclusao.php?id_usuario=$linha[0]'> Excluir</a>";
                echo "<button class='mpedidos' onclick=meuspedidos()>
                Meus pedidos</button>";
            }
            pg_close($conecta);
        ?>
</center>
            <?php include "footer.html" ?>
        </div>
    </body>
</html>
   