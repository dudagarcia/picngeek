<?php
  session_start();
  session_destroy();
  echo "<script type='text/javascript'>alert('Conta deslogada com sucesso!')</script>";
  echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
?>
