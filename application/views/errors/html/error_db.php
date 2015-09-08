<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class="error-page" lang="ru">
<head>
    <title>Ошибка базы данных</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" media="screen" href="/errors/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="/errors/css/bootstrap-theme.min.css">

    <!-- Bootstrap Admin Theme -->
    <link rel="stylesheet" media="screen" href="/errors/css/bootstrap-admin-theme.css">

    <!-- Bootstrap Error Page -->
    <link rel="stylesheet" media="screen" href="/errors/css/bootstrap-error-page.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/errors/js/html5shiv.js"></script>
    <script type="text/javascript" src="/errors/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- content -->
<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-lg-12">
            <div class="centering text-center error-container">
                <div class="text-center">
                    <h2 class="without-margin"><span class="text-danger"><?php echo $heading; ?></h2>
                    <h4 class="text-danger">Ошибка базы данных</h4>
                </div>
                <div class="text-center">
                    <blockquote>
                        <p><?php echo $message; ?></p>
                    </blockquote>
                    <h3><small>Выберите опцию ниже</small></h3>
                </div>
                <hr>
                <ul class="pager">
                    <li><a href="javascript:history.back()">Назад</a></li>
                    <li><a href="/">На главную</a></li>
                    <!-- <li><a href="error-pages.html">Other error pages &rarr;</a></li> -->
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<div class="navbar navbar-footer navbar-fixed-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <footer role="contentinfo">
                    <p class="left"></p>
                    <p class="right">&copy; 2015 <a href="http://xkelxmc.youweb.su" target="_blank">xkelxmc</a></p>
                </footer>
            </div>
        </div>
    </div>
</div>
</body>
</html>