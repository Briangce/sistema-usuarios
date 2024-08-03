<?php
include_once "./version.php";
?>
<!DOCTYPE html>
<html lang="pt-Br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, follow" />
    <title>Umentor - Sistema Usuarios</title>
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Umentor ê um Sistema de RH que ajuda na performance e na avaliação de desempenho da sua equipe! Tudo que o seu departamento de RH precisa em um só lugar." />
    <meta property="og:url" content="https://localteste.42web.io/index.php" />
    <meta property="og:site_name" content="Umentor" />
    <meta property="og:image" content="https://painel.umentor.com.br/system/filemanager/files/candidato_umentor-brasil_2_1614018045.jpg" />
    <meta property="og:image:secure_url" content="https://painel.umentor.com.br/system/filemanager/files/candidato_umentor-brasil_2_1614018045.jpg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Umentor ê um Sistema de RH que ajuda na performance e na avaliação de desempenho da sua equipe! Tudo que o seu departamento de RH precisa em um só lugar." />
    <meta name="twitter:image" content="https://painel.umentor.com.br/system/filemanager/files/candidato_umentor-brasil_2_1614018045.jpg" />
    <link rel="icon" type="image/png" sizes="32x32" href="https://cdn2.cardume.digital/public/sites/umentor/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://cdn2.cardume.digital/public/sites/umentor/favicons/favicon-16x16.png">
    <link rel="stylesheet" href="/assets/css/bootstrap1.min.css?v=<?=$version?>" />
    <link rel="stylesheet" href="/assets/vendors/themefy_icon/themify-icons.css?v=<?=$version?>" />
    <link rel="stylesheet" href="/assets/vendors/font_awesome/css/all.min.css?v=<?=$version?>" />
    <link rel="stylesheet" href="/assets/css/metisMenu.css?v=<?=$version?>" />
    <link rel="stylesheet" href="/assets/css/style1.css?v=<?=$version?>" />
    <link rel="stylesheet" href="/assets/vendors/codemirror5/lib/codemirror.css?v=<?=$version?>">
    <link rel="stylesheet" href="/assets/vendors/codemirror5/theme/material-darker.css?v=<?=$version?>">
    <link rel="stylesheet" type="text/css" href="/assets/css/util.css?v=<?=$version?>" />
    <link rel="stylesheet" type="text/css" href="/assets/css/login_main.css?v=<?=$version?>" />
	  <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.min.css?v=<?=$version?>">
    <link rel="stylesheet" type="text/css" href="/assets/css/icons.css?v=<?=$version?>">
	  <script src="/assets/js/jquery-3.6.3.min.js?v=<?=$version?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
  
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <form id="login-form" class="login100-form validate-form" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <img style="width: 115px; display: block; text-align: center; margin: 0 auto; margin-bottom: 20px;" src="/assets/img/logo_2.png" data-selected="true" data-label-id="0">
            <span class="login100-form-title p-b-35">Bem-vindo,<br>faça seu login</span>
            <div id="error-login" class="p-b-8" style="color:red;text-align:center"><?php echo $erro_login; ?> </div>
              <input name="acao" value="doLogin" hidden>
              <input name="action" value="authentication" hidden>
            <div class="wrap-input100 validate-input">
              <input class="input100" type="text" name="email" />
              <span class="focus-input100"></span>
              <span class="label-input100">Email</span>
            </div>
            <div
              class="wrap-input100 validate-input">
              <input class="input100" type="password" name="password" />
              <span class="focus-input100"></span>
              <span class="label-input100">Password</span>
            </div>
            <!-- <div class="flex-sb-m w-full p-t-3 p-b-32">
              <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" />
                <label class="label-checkbox100" for="ckb1"> Remember me </label>
              </div>
              <div>
                <a href="#" class="txt1"> Forgot Password? </a>
              </div>
            </div> -->
            <div class="container-login100-form-btn">
              <button class="login100-form-btn" id="button-login">Login</button>
            </div>
          </form>
          <div class="login100-more" style="background-image: url('/assets/img/bg-01.jpg')"></div>
        </div>
      </div>
    </div>
    <script src="/assets/js/conecta.js?v=<?=$version?>"></script>
	<script>
    var isEmail = /^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/

    $(".input100").on("blur", function () {
      if ($(this).val().trim() != "") {
        $(this).addClass("has-val");
      }else{
        $(this).removeClass("has-val");
      }
    });
    
	</script>
    </body>
</html>