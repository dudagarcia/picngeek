<!DOCTYPE html>
<html>

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


            <form action="verificaCadastro.php" method="post">
                <div class="container">
                    <center><h1>Cadastro</h1></center>
                    <hr>
                    <div class="col-50">

                        <label> Nome* </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Não utilize abreviações" maxlength="20" name="nome" required><br></center>

                        <label> Sobrenome* </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Não utilize abreviações" maxlength="30" name="sobrenome" required><br></center>


                        <label> Sexo* </label><br>
                        <center><input type="radio" name="sexo" value="m" checked>
                        Masculino
                        <input type="radio" name="sexo" value="f">
                        Feminino
                        <input type="radio" name="sexo" value="o">
                        Não informar<br></center>


                        <label> Data de nascimento* </label><br>
                        <center><input type="date" style="width:350px;" placeholder="Utilize o formato dd/mm/aaaa"  name="data_nasc" required><br></center>

                        <label> Telefone* </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Não utilize pontos ou traços e insira seu DDD" maxlength="9" name="telefone" required><br></center>

                        <label> Celular* </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Não utilize pontos ou traços e insira seu DDD" maxlength="9" name="celular" required><br></center>

                        <label> E-mail* </label><br>
                        <center><input type="email" style="width:350px;" placeholder="Digite um endereço válido" maxlength="40" name="email" required><br></center>


                        <label> Login* </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite um login válido" maxlength="40" name="login" required><br></center>

                        <label> Senha* </label><br>
                        <center><input type="password" style="width:350px;" placeholder="Utilize no máximo 15 caracteres" maxlength="15" name="senha" required><br></center>

                        <label> Confirmar senha* </label><br>
                        <center><input type="password" style="width:350px;" placeholder="Utilize no máximo 15 caracteres" maxlength="15" name="senha2" required></center>
                    </div>
                    <div id="col-50">
                        <label> Rua* </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite uma rua válida" maxlength="30" name="endereco" required><br></center>

                        <label> Número* </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite um valor válido" maxlength="6" name="numero" required><br></center>

                        <label> Complemento </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite um complemento válida" maxlength="5" name="complemento"><br></center>

                        <label> Bairro* </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite um bairro válido" maxlength="30" name="bairro" required><br></center>

                        <label> CEP* </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Não utilize pontos ou traços" maxlength="8" name="cep" required><br></center>

                        <label> Cidade* </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite uma cidade válida" maxlength="25" name="cidade" required><br></center>

                        <label> Estado* </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite um estado válida" maxlength="35" name="estado" required><br></center>

                        <label> País* </label><br>
                        <center><input type="text" style="width:350px;" placeholder="Digite um país válido" maxlength="20" name="pais" required></center>
                    </div>
                    <center>
                    <div class="clearfix">
                        <button type="submit" class="signupbtn">Cadastrar</button>
                    </div></center>
                </div>

            </form>
            <?php include "footer.html" ?>
        </div>
</body>

</html>
