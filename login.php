<?php
include "conexao.php";
session_start();
$login = '';
$senha = '';
if(isset($_POST['login'])){$login = strtolower($_POST['login']);}
if(isset($_POST['senha'])){$senha = $_POST['senha'];}
$sql = "select * from usuario where login = '{$login}' and excluido='n'";
$resultado= pg_query($conecta, $sql);
$linhas=pg_affected_rows($resultado);
if ($linhas > 0)
{
  $sqll = "select * from usuario where senha = '{$senha}' and excluido='n'";
  $resultadoo= pg_query($conecta, $sqll);
  $linhass=pg_affected_rows($resultadoo);
  if ($linhass > 0)
  {
    echo $login;
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
  }
  else
  {
    echo "senha";
  }
}
else
{
  $sq = "select * from picngeek.usuarioadm where login ='{$login}'";
  $result = pg_query($conecta, $sq);
  $lin = pg_affected_rows($result);
  if($lin>0)
  {
    $sqq = "select * from picngeek.usuarioadm where senha ='{$senha}'";
    $resultt = pg_query($conecta, $sqq);
    $linn = pg_affected_rows($resultt);
    if($linn>0)
    {
      echo $login;
      $_SESSION['login'] = $login;
      $_SESSION['senha'] = $senha;
      $_SESSION['admin'] = true;
    }
    else
    {
      echo "senha";
    }
  }
  else
  {
    echo "login";
  }
}
pg_close($conecta);
?>
