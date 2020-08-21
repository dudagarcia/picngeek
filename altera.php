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

            <?php
    include "conexao.php";
    session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location:index.php');
    }
    $login = $_SESSION['login'];
    $senha = $_SESSION['senha'];
            
    $sql4="select * from usuario where login = '{$login}' and senha = '{$senha}' and excluido='n';";
    $resultado4=pg_query($sql4);
    $linha4=pg_num_rows($resultado4);
    $linha44=pg_fetch_array($resultado4);
    $id=$linha44['id_usuario'];
    
    $sql="select * from cliente where id_usuario = $id and excluido='n';";
    $resultado=pg_query($conecta,$sql);
    $qtde=pg_num_rows($resultado);
    if ( $qtde == 0 )
    {
        echo "Cadastro nao encontrado !!!<br><br>";
        exit;
    }
    $linha = pg_fetch_array($resultado);
    ?>


            <form action="verificaAlteracao.php" method="post">
                <div class="container">
                    <center> <h1>Alteração</h1> </center>
                    <hr>
                    <div class="col-50">

                        <label> Código do usuário </label><br>
                        <center><input type="text" style="width:350px;" value="<?php echo $linha['id_usuario']; ?>" name="id_usuario" readonly><br></center>

                        <label> Nome </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Não utilize abreviações" maxlength="20" name="nome" value="<?php echo $linha['nome']; ?>" required><br></center>

                        <label> Sobrenome </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Não utilize abreviações" maxlength="30" name="sobrenome" value="<?php echo $linha['sobrenome']; ?>" required><br></center>



                        <label> Sexo </label><br>
                        <center><input type="radio" name="sexo" value="<?php echo $linha['sexo']; ?>" checked>
                        Masculino
                        <input type="radio" name="sexo" value="<?php echo $linha['sexo']; ?>">
                        Feminino
                        <input type="radio" name="sexo" value="<?php echo $linha['sexo']; ?>">
                        Não informar<br></center>


                        <label> Data de nascimento </label><br>
                        <center><input type="date" style="width:350px;" placeholder="Utilize o formato dd/mm/aaaa" value="<?php echo $linha['data_nasc']; ?>" maxlength="" name="data_nasc" required><br></center>

                        <label> Telefone </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Não utilize pontos ou traços e insira seu DDD" maxlength="9" name="telefone" value="<?php echo $linha['telefone']; ?>" required><br></center>

                        <label> Celular </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Não utilize pontos ou traços e insira seu DDD" maxlength="9" name="celular" value="<?php echo $linha['celular']; ?>" required><br></center>

                        <label> E-mail </label><br>
                        <center><input type="email" style="width:350px;" placeholder="Digite um endereço válido" maxlength="40" name="email" value="<?php echo $linha44['email']; ?>" required><br></center>


                        <label> Login </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite um login válido" maxlength="40" name="login" value="<?php echo $linha44['login']; ?>" readonly><br></center>

                        <label> Senha </label><br>
                        <center><input type="password" style="width:350px;" placeholder="Utilize no máximo 15 caracteres" value="<?php echo $linha44['senha']; ?>" maxlength="15" name="senha_alt" required><br></center>
                    </div>
                    <div id="col-50">
                        <?php
                           
                            $sql1 ="select * from endereco where id_usuario = $id and excluido='n';";
                            $resultado1 =pg_query($conecta,$sql1);
                            $qtde1 =pg_num_rows($resultado1);
                            if ( $qtde1 == 0 )
                            {
                                echo "Cadastro nao encontrado !!!<br><br>";
                                exit;
                            }
                            $linha1 = pg_fetch_array($resultado1);
                            ?>
                        <label> Rua </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite uma rua válida" maxlength="30" name="endereco" value="<?php echo $linha1['endereco']; ?>" required><br></center>

                        <label> Número </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite um valor válido" maxlength="6" name="numero" value="<?php echo $linha1['numero']; ?>" required><br></center>

                        <label> Complemento </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite um complemento válida" maxlength="5" value="<?php echo $linha1['complemento']; ?>" name="complemento"><br></center>

                        <label> Bairro </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite um bairro válido" maxlength="30" value="<?php echo $linha1['bairro']; ?>" name="bairro" required><br></center>

                        <label> CEP </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Não utilize pontos ou traços" maxlength="8" value="<?php echo $linha1['cep']; ?>" name="cep" required><br></center>

                        <label> Cidade </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite uma cidade válida" maxlength="25" name="cidade" value="<?php echo $linha1['cidade']; ?>" required><br></center>

                        <label> Estado </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite um estado válida" maxlength="35" name="estado" value="<?php echo $linha1['estado']; ?>" required><br></center>

                        <label> País </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite um país válido" maxlength="20" name="pais" value="<?php echo $linha1['pais']; ?>" required></center>
                    </div>
                    <center>
                    <div class="clearfix">
                        <button type="submit" class="signupbtn">Alterar</button>
                    </div>
                    </center>
                </div>
            </form>

            <?php include "footer.html" ?>



        </div>
</body>

</html>
