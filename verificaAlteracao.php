<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pic N Geek</title>
    <link rel="shortcut icon" type="image/x-icon" href="media/logo.ico" />
</head>

<body>
    <?php
        include "conexao.php";
        session_start();
        if((!isset ($_SESSION['login']) == true) and  (!isset ($_SESSION['senha']) == true))
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.php');
        }
 
        $login = $_SESSION['login'];
        $senha = $_SESSION['senha'];
        
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
       
        $sexo = $_POST["sexo"];
        $nasc = $_POST["data_nasc"];
        $celular = $_POST["celular"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];
        $senha_alt = $_POST["senha_alt"];
	$senha_alt = md5($senha_alt);
        $rua = $_POST["endereco"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];
        $bairro = $_POST["bairro"];
        $cep = $_POST["cep"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $pais = $_POST["pais"];

     
        $sql1 = "select * from usuario where login='{$login}' and senha='{$senha}' and excluido='n';";
        $resultado1=pg_query($conecta,$sql1);
        $linha1=pg_num_rows($resultado1);
        $linha11=pg_fetch_array($resultado1);
        $id=$linha11['id_usuario'];
    
        $sql="update cliente set 
        nome = '$nome', 
        sobrenome = '$sobrenome',  
        sexo = '$sexo', 
        data_nasc = '$nasc', 
        celular = '$celular', 
        telefone = '$telefone'
        where id_usuario = $id";
    
        $resultado=pg_query($conecta,$sql);
        $qtde=pg_affected_rows($resultado);
        
        
    
    
        $sqll="update endereco set 
            endereco = '$rua', 
            numero = '$numero', 
            complemento = '$complemento', 
            bairro = '$bairro',
            cep = '$cep', 
            cidade = '$cidade',
            estado = '$estado', 
            pais = '$pais'
            where id_usuario = $id";
    
        $resultadoo=pg_query($conecta,$sqll);
        $qtdee=pg_affected_rows($resultadoo);
    
        $sql2="update usuario set 
        email = '$email',
        senha = '$senha_alt'
        where id_usuario = $id";
        $resultado2=pg_query($conecta,$sql2);
        $qtde2=pg_affected_rows($resultado2);
        if ($qtde>0 or $qtdee > 0 or qtde2>0)
        {
            echo "<script type='text/javascript'>alert('Alteração realizada com sucesso')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=seusdados.php'>";
        }
        else
        {
            echo "Erro na gravacao !!!<br><br>";
        }
    
        pg_close($conecta);
    ?>

</body>

</html>
