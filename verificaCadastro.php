
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
$conecta = pg_connect("host = localhost port = 5432 dbname = 2018_72_Compartilhado user = alunocti password = alunocti");

            $login= strtolower($_POST['login']);
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            
            $sexo = $_POST['sexo'];
            $nasc = $_POST['data_nasc'];
            $celular = $_POST['celular'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $senha2 = $_POST['senha2'];
            $rua = $_POST['endereco'];
            $numero = $_POST['numero'];
            $complemento = $_POST['complemento'];
            $bairro = $_POST['bairro'];
            $cep = $_POST['cep'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $pais = $_POST['pais'];
            $excluido = 'n';
            $bool = 1;
            $senha = md5($senha);
            $senha2 = md5($senha2);
        
            

            if($senha != $senha2)    
            {
                echo "<script type='text/javascript'>alert('Digite duas senhas compatíveis!')</script>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cadastro.php'>";
                $bool =0;
            }
        
            $sql="select * from usuario where login = '{$login}' and excluido='n';";
            $resultado=pg_query($conecta,$sql);
            $linhas=pg_num_rows($resultado);
         
        
            $sql5="select * from usuario where email='{$email}' and excluido='n';";
            $resultado5=pg_query($conecta,$sql5);
            $linhas5=pg_num_rows($resultado5);
        
            if ($linhas>0 or $linha5>0) 
            {  
                echo "<script type='text/javascript'>alert('O login já está cadastrado!')</script>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cadastro.php'>";
            }
        
            else if ($bool==1)
            {
               

               $sql2="SELECT NEXTVAL ('usuario_id_usuario_seq') AS id;";
                $resultado2=pg_query($conecta,$sql2);
                $qtde=pg_num_rows($resultado2);
                if ($qtde==0)
                {
                    echo "xxxx";
                }
                $linha2=pg_fetch_array($resultado2);
                $id=$linha2['id'];
               
                
                $sql4="insert into usuario (id_usuario, login, email, senha, excluido) values ('$id','$login', '$email', '$senha', '$excluido');";
                $resultado4=pg_query($conecta,$sql4);
                $linhas4=pg_affected_rows($resultado4);
                if($linhas4 == 0)
                {
                    echo "123";
                }
                
                
                $sqll="insert into cliente(id_usuario,nome,sobrenome,sexo,data_nasc,celular,telefone,excluido) values ('$id','$nome', '$sobrenome', '$sexo', '$nasc', '$celular', '$telefone', '$excluido');";
                $resultadoo=pg_query($conecta,$sqll);
                $linhass=pg_affected_rows($resultadoo);
                if($linhass == 0)
                {
                    echo "123";
                }


                $sq="insert into endereco (id_endereco, id_usuario, endereco, numero, complemento, bairro, cep, cidade, estado, pais, excluido) values (DEFAULT, '$id', '$rua', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado', '$pais', '$excluido');";
                $result=pg_query($conecta,$sq);
                $linh=pg_affected_rows($result);


                if ($linh>0 && $linhass>0 && $linha2>0 && $bool=1)
                {
                    echo "<script type='text/javascript'>alert('Cadastro realizado com sucesso')</script>";
                header('location:index.php');
                }

            }
            pg_close($conecta);
        ?>
</body>

</html>