<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include "header.php" ?>

    <link rel="stylesheet" href="css/maisDetalhes.css">

</head>

<body>

  <div id="section1">


  <?php
  include "conexao_picngeek.php";
  $id_prod = '';
  $id_prod = $_POST['id_prod'];
  $sql="select * from produto where id_prod='{$id_prod}';";
  $resultado= pg_query($conecta, $sql);
  $qtde=pg_num_rows($resultado);
  if ($qtde > 0)
  {
      $linha=pg_fetch_array($resultado);
      echo "
      <div id='titulo'>
        <h1>".$linha[nome]."</h1>
      </div>
      <div id='corpo'>
        <div id='imagem'>
          <img src='".$linha[imagem]."'>
        </div>
        <div id='detalhes'>
          <div id='info'>
            <label>
              <b>Categoria: </b><span>".$linha[categoria]."</span>
            </label>
            <label>
              <b>Preço: </b><span>".$linha[preco]."</span>
            </label>
            <label>
            <b>Dimensão: </b><span>".$linha[dimensao]."</span>
            </label>";
            if($linha[qtde_estoque] > 0){
              echo "
            <form method='post' action=''>
              <label>
                <b>Quantidade: </b>
                <input type='number' value='1' min='1' max='".$linha[qtde_estoque]."'>
              </label>
              <input type='hidden' name='id_prod' value='".$id_prod."'>
              <input type='submit' value='COMPRAR'>
            </form>
          </div>
        </div>
      </div>";}
          else{
            echo "
            <div class='indisponivel'>
              <h1>Produto não disponível!</h1>
            </div>";}
  }
  else
  echo "
  <div class='indisponivel'>
    <h1>Produto não disponível!</h1>
  </div>";

  include "footer.html"; ?>

  </div>


</body>

</html>
