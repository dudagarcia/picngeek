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
    <?php include "header.php" ?>
</head>

<body>

    <center>
        <div class="mae" id="section1">

            Digite seu login:
            <input type="text" name="login" maxlength="40">
            Digite uma nova senha para sua conta:
            <input type="password" name="senha">
            <input type="submit" value="Enviar">
            <?php
         include "conexao.php";
         $senha = $_POST["senha"];
         $login = $_POST["login"];
         $sql= "insert '{$senha}' into usuario where login = '{$login}'"
         $resultado = pg_query($conecta, $sql);
         $qtde = pg_affected_rows($resultado);
         if ($qtde > 0)
         {
             echo "Senha alterada com sucesso! <br> ";
         }
    ?>
            <a href="index.php"> VOLTAR AO MENU </a>

            <?php include "footer.html" ?>
        </div>
    </center>
</body>

</html>
