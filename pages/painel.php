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
  <meta property="og:url" content="https://testeab.42web.io/index.php" />
  <meta property="og:site_name" content="Umentor" />
  <meta property="og:image" content="https://painel.umentor.com.br/system/filemanager/files/candidato_umentor-brasil_2_1614018045.jpg" />
  <meta property="og:image:secure_url" content="https://painel.umentor.com.br/system/filemanager/files/candidato_umentor-brasil_2_1614018045.jpg" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Umentor ê um Sistema de RH que ajuda na performance e na avaliação de desempenho da sua equipe! Tudo que o seu departamento de RH precisa em um só lugar." />
  <meta name="twitter:image" content="https://painel.umentor.com.br/system/filemanager/files/candidato_umentor-brasil_2_1614018045.jpg" />
  <link rel="shortcut icon" href="https://painel.umentor.com.br/favicon.ico" type="image/png">
  <link rel="stylesheet" href="/assets/css/bootstrap1.min.css?v=<?=$version?>" />
  <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css?v=<?=$version?>" rel="stylesheet">
  <link rel="stylesheet" href="/assets/vendors/themefy_icon/themify-icons.css?v=<?=$version?>" />
  <link rel="stylesheet" href="/assets/vendors/font_awesome/css/all.min.css?v=<?=$version?>" />
  <link rel="stylesheet" href="/assets/css/metisMenu.css?v=<?=$version?>" />
  <link rel="stylesheet" href="/assets/vendors/datatable/css/jquery.dataTables.min.css?v=<?=$version?>" />
  <link rel="stylesheet" href="/assets/vendors/datatable/css/responsive.dataTables.min.css?v=<?=$version?>" />
  <link rel="stylesheet" href="/assets/vendors/datatable/css/buttons.dataTables.min.css?v=<?=$version?>" />
  <link rel="stylesheet" href="/assets/css/style1.css?v=<?=$version?>" />
  <link rel="stylesheet" type="text/css" href="/assets/css/util.css?v=<?=$version?>" />
  <link rel="stylesheet" type="text/css" href="/assets/css/login_main.css?v=<?=$version?>" />
  <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.min.css?v=<?=$version?>">
  <link rel="stylesheet" type="text/css" href="/assets/css/icons.css?v=<?=$version?>">
  <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css?v=<?=$version?>" rel="stylesheet">
  <script src="/assets/js/jquery-3.6.3.min.js?v=<?=$version?>"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

  <style>
    .table-responsive {
      width: 100% !important;
      margin-bottom: 15px !important;
      overflow-y: hidden !important;
      overflow-x: scroll !important;
      -ms-overflow-style: -ms-autohiding-scrollbar !important;
      border: 0px solid #ddd !important;
      -webkit-overflow-scrolling: touch !important;
      padding-top: 5px;
    }

    .inputCamp {
      display: block;
    }

    #containerForm button {
      margin: 0 auto;
    }

    select {
      width: 189px;
      height: 30px;
      text-align: center;
    }

    table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
      top: 50%;
      left: 8px;
      border: none;
      box-shadow: none;
      line-height: 11px;
      background-color: #2d1967;
      color: #fff;
      width: 15px;
      text-align: center;
      line-height: 1.5;
      vertical-align: -webkit-baseline-middle;
      border-radius: 10px;
      font-size: 10px !important;
    }

    table.dataTable.dtr-inline.collapsed>tbody>tr.parent>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr.parent>th:first-child:before {
      content: "-";
      background-color: #7f6db0;
    }

    table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child::before,
    table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child::before {
      font-size: 14px;
    }

    .CodeMirror {
      width: 100% !important;
    }

    table.dataTable thead th {
      text-align: center;
    }

    .dataTables_paginate a:hover {
      background: #3f51b5 !important;
      box-shadow: none !important;
    }

    .page-item.active .page-link {
      background-color: #2d1967e6 !important;
      border-color: #2d1967e6;
      box-shadow: none !important;
    }

    div#DataTables01_paginate {
      margin-top: 20px;
    }

    #DataTables01_filter label .d-flex {
      justify-content: flex-end;
    }

    input.form-control.form-control-sm {
      width: 100% !important;
    }

    #DataTables01_filter label {
      margin-bottom: 10px;
    }

    #DataTables01_wrapper .row {
      align-items: center;
    }

    .serach_field_2 .search_inner input:focus {
      border: 1px solid #dcdcee !important;
    }

    table.dataTable.table-striped>tbody>tr:nth-of-type(2n+1)>* {
      box-shadow: inset 0 0 0 9999px rgb(242 249 255);
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
      padding: 0 !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:active {
      outline: none;
      background-color: inherit;
    }

    .QA_section .QA_table th,
    .QA_section .QA_table td {
      padding: 14px 35px !important;
    }

    .serach_field-area .search_inner {
      display: none;
    }

    @media only screen and (max-width: 1623px) {
      .dropdown-menu {
        inset: 0px -265px auto auto !important;
        transform: none !important;
      }
    }

    @media only screen and (min-width: 992px) {
      .footer_part {
        padding-bottom: 40px;
        padding-top: 6px;
        padding-left: 270px;
      }
    }

    @media only screen and (max-width: 991px) {
      .main_content_iner {
        padding: 20px
      }
    }

    @media only screen and (max-width: 575px) {
      .add_button .btn_1 {
        display: block;
      }

      .add_button {
        margin-left: 0 !important;
      }

      .list_header h4,
      .dashboard_header {
        margin-bottom: 15px !important;
      }

      .add_button .btn_1,
      .dashboard_header_title,
      .list_header h4 {
        text-align: center;
      }

      .sidebar .logo {
        padding: 0;
        margin-top: 70px;
      }

      .profile_info img {
        max-width: 53px;
      }

      .sidebar_icon i {
        font-size: 36px;
      }

    }

    @media only screen and (max-width: 441px) {
      .dropdown-menu {
        display: flex !important;
        inset: -8px 0px 0px -60px !important;
        align-items: center;
        flex-direction: column-reverse;
        transform: none !important;
      }

      .dropdown-menu:not(.show) {
        display: none !important;
      }

      .dropdown-menu a {
        margin-top: 7px !important;
      }

    }
  </style>

  <div class="modal fade " id="Modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-lg-down">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="save">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <nav class="sidebar">
    <div class="logo d-flex justify-content-between">
      <a href="#"><img src="/assets/img/logo.png" alt="" /></a>
      <div class="sidebar_close_icon d-lg-none">
        <i class="ti-close"></i>
      </div>
    </div>
    <ul id="sidebar_menu" class="metismenu">
        <li class="mm-active">
          <a class="has-arrow" href="#" aria-expanded="true">
            <img src="/assets/img/menu-icon/4.svg" alt="" />
            <span>Colaboradores</span>
          </a>
          <ul class="mm-collapse">
            <li><a href="" class="menuOp" id="geralUsers">Painel</a></li>
          </ul>
        </li>
    </ul>
  </nav>
  <section class="main_content dashboard_part">
    <div class="container-fluid g-0">
      <div class="row">
        <div class="col-lg-12 p-0">
          <div class="header_iner d-flex justify-content-between align-items-center">
            <div class="sidebar_icon d-lg-none">
              <i class="ti-menu"></i>
            </div>
            <div class="serach_field-area">
              <div class="search_inner">
                <form action="#">
                  <div class="search_field">
                    <input type="text" placeholder="Pesquisar campanhas...">
                  </div>
                  <button type="submit">
                    <img src="/assets/img/icon/icon_search.svg" alt="">
                  </button>
                </form>
              </div>
            </div>
            <div class="header_right d-flex justify-content-between align-items-center">
              <div class="header_notification_warp d-flex align-items-center">
              </div>
              <div class="profile_info">
                <img src="/assets/img/client_img.png" alt="#">
                <div class="profile_info_iner">
                  <div class="profile_author_name">
                    <p>Olá,</p>
                    <h5><?= $nome ?></h5>
                  </div>
                  <div class="profile_info_details">
                    <a href="" id="logout">Log Out</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main_content_iner ">
    </div>
    <div class="footer_part">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="footer_iner text-center">
              <p>2024 © Sistema Usuarios - Designed by <a href="#"> Brian García</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="/assets/js/jquery.mask.min.js"></script>
  <script src="/assets/js/moment.js"></script>
  <script src="/assets/js/universal.js?v=<?=$version?>"></script>
  <script src="/assets/js/popper1.min.js?v=<?=$version?>"></script>
  <script src="/assets/js/bootstrap1.min.js?v=<?=$version?>"></script>
  <script src="/assets/js/metisMenu.js?v=<?=$version?>"></script>
  <script src="/assets/js/conecta.js?v=<?=$version?>"></script>
  <script src="/assets/js/painel.js?v=<?=$version?>"></script>
  <script src="/assets/js/custom.js?v=<?=$version?>"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js?v=<?=$version?>"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js?v=<?=$version?>"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js?v=<?=$version?>"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js?v=<?=$version?>"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js?v=<?=$version?>"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js?v=<?=$version?>"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js?v=<?=$version?>"></script>
 <script>
    $("#logout").click(function(e) {
      e.preventDefault()
      ajax({
        acao: "logout"
      }, "logout")
    })
  </script>
</body>

</html>