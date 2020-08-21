<?php
    include "conexao_picngeek.php";
      $categoria = $_POST['categoria'];
  $sql = '';
  $data = array(
    array(),
    array(),
    array(),
    array()
  );
  if(!isset($_POST['categoria']))
    $sql="select * from produto";
  else
    $sql="select * from produto where categoria = '".$categoria."';";
  $resultado= pg_query($conecta, $sql);
    $qtde=pg_num_rows($resultado);
  if ($qtde > 0)
  {
      for ($cont = 0; $cont < $qtde; $cont++)
      {
          $linha = pg_fetch_array($resultado);
          $data[0][$cont] = $linha['nome'];
          $data[1][$cont] = $linha['preco'];
          $data[2][$cont] = $linha['imagem'];
          $data[3][$cont] = $linha['id_prod'];
      }
  }
    echo json_encode($data);
?>
