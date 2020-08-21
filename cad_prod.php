<!DOCTYPE html>
<?php
    include "conexao_picngeek.php";
    session_start();
    $sub = $_POST['subCad'];
    if(isset($sub))
    {
        
        $nome = $_POST['nome'];
        $categoria = $_POST['categ'];
        $quantidade = $_POST['qtde'];
        $preco = $_POST['preco'];
        $dimensao = $_POST['dimensao'];
        $img = $_POST['imagem'];
        $excluido = 'n';
        $sql = "insert into produto values (DEFAULT, '$nome', '$preco','$categoria', '$dimensao','$excluido', NULL, $quantidade, '$img')";
        $query = pg_query($conecta, $sql);
            $num = pg_affected_rows($query);
            if($num > 0)
            {
                ?>
                <script>
                    document.getElementById('formCad').reset;
                    alert('Cadastro realizado com sucesso!');
                </script>
                <?php
            }
            else
            {
                ?>
                <script>
                    alert('Falha no cadastro! Favor tente novamente.');
                </script>
                <?php
            }
    }
    pg_close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>imagem</title>
</head>
<body>
   <h1> Cadastrar produto </h1>
    <form action="" id="formCad" method="post">
        Nome do produto <input type="text" name="nome"> <br>
        Categoria <input type="text" name="categ"> <br>
        Quantidade em estoque <input type="number" name="qtde"> <br>
        Preço <input type="text" name="preco"> <br>
        Dimensão <input type="text" name="dimensao"> <br>
        
        <input type="file" name="arquivoInput" id="arquivo" accept="image/*" require>
           <img src="" alt="Upload" id="imagemUp">
           <br>
            <br>
        <input type="hidden" name="imagem" id="hidImg" value="">
            <br>
        <input type="submit" value="Cadastrar produto!" id="botCadProd" name="subCad">
        
    </form>
    <script src="prodcadastro.js"></script>
    <script src="../../app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>