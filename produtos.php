<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pic N Geek</title>

    <?php include "header.php" ?>

    <script src="javascript/produto.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/produtos.css">

    <style>#btnProdutos{background-color: black !important;
    color: white !important;}</style>

</head>

<body>


    <div id="menuCategorias">
        <b>CATEGORIAS</b><br><br>
        <label for="musica" class="menuOption">
            <a>Música</a>
            <input type="radio" name="category" value="musica" id="musica">
            <span class="circle"></span>
        </label>
        <label for="filmes" class="menuOption">
            <a>Filmes</a>
            <input type="radio" name="category" value="filmes" id="filmes">
            <span class="circle"></span>
        </label>
        <label for="series" class="menuOption">
            <a>Séries</a>
            <input type="radio" name="category" value="series" id="series">
            <span class="circle"></span>
        </label>
    </div>

    <div id="section1">

        <div id="shop" onload="pegaProdutos();setTamanho()">
        </div>

    </div>

    <?php include "footer.html" ?>

</body>

</html>
