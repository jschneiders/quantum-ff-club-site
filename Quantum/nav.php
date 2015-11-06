<!DOCTYPE html>
<?php
  if($_GET['pag']){
    $pag = $_GET['pag'];
    $nome = ' - '.$pag;
    $conteudo = $pag.".php";
  }
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quantum Firefox Club <?php echo $conteudo; ?></title>
  <link rel="shortcut icon" href="style/imgs/atomfox.png" type="image/x-icon"></link>
  <link href="style/style.css" rel="stylesheet" media="screen" />
  <link href='https://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
  <nav class="menu">
    <ul>
      <li><a href="">home</a></li>
      <li><a href="nav.php?pag=sobre">sobre</a></li>
      <li><a href="">eventos quantum & mozilla</a></li>
      <li><a href="">JS 201</a></li>
      <li><a href="">contato</a></li>
    </ul>
  </nav>
  <div class="conteudo">
    <?php if($conteudo){include $conteudo;} ?>
  </div>
</body>
</html>
