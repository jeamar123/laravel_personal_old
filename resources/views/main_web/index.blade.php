<!DOCTYPE html>
<html lang="en" ng-app="app">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <title>Monthly Expenses</title> -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/ico">


    <!-- <link href="{{ asset('css/angular-material.min.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="../assets/main/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../assets/main/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/main/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/main/css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="../assets/main/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/main/css/custom.css">
    <!-- <link rel="stylesheet" type="text/css" href="../assets/main/css/responsive.css"> -->
  </head>
  <body ng-controller="mainController">

    <div class="main-body-container" ng-class="{'move':isRightShown}">
      <div ui-view="header"></div>

      <section class="main-content-container" >
        <div ui-view="main"></div>
      </section>
    </div>

    <div ui-view="rightContent"></div>
  </body>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>

  <script type="text/javascript" src="<?php echo $server; ?>/assets/main/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $server; ?>/assets/main/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo $server; ?>/assets/main/js/angular.min.js"></script>
  <script type="text/javascript" src="<?php echo $server; ?>/assets/main/js/angular-ui-router.min.js"></script>
  <script type="text/javascript" src="<?php echo $server; ?>/assets/main/js/angular-local-storage.min.js"></script>
  <script type="text/javascript" src="<?php echo $server; ?>/assets/main/process/app.js"></script>


  <script type="text/javascript" src="<?php echo $server; ?>/assets/main/process/controllers/mainController.js"></script>


  <script type="text/javascript" src="<?php echo $server; ?>/assets/main/process/directives/authDirective.js"></script>
  <script type="text/javascript" src="<?php echo $server; ?>/assets/main/process/directives/mapDirective.js"></script>


  <script type="text/javascript" src="<?php echo $server; ?>/assets/main/process/services/services.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOzaOYgvdwnATwVIvSpYixj32rTLbVF3k"></script>
</html>