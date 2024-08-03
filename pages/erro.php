<?php
include_once "./version.php";
?>
<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A pagina não existe ou não está mais disponível</title>
    <link rel="icon" href="/assets/img/icon.png" type="image/png" />
    <link rel="stylesheet" href="/assets/css/bootstrap1.min.css?v=<?=$version?>" />
    <link rel="stylesheet" href="/assets/css/style1.css?v=<?=$version?>" />

</head>
<body>

<div class="erroe_page_wrapper">
<div class="errow_wrap">
<div class="container text-center">
    
<img src="/assets/img/sad.png" alt="">
<div class="error_heading  text-center">
<h3 class="headline font-danger theme_color_1">Página não encontrada</h3>
</div>
<div class="col-md-8 offset-md-2 text-center">
<p>Desculpe, a pagina que você está tentando acessar não está mais disponível ou simplesmente não existe.</p>
</div>
<div class="error_btn  text-center">
<a class=" default_btn theme_bg_1 " href="#">Entrar no site</a>
</div>
</div>
</div>
</div>
</body>
</html>