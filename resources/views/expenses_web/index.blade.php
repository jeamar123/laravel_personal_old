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
    <link rel="stylesheet" type="text/css" href="../assets/expenses/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../assets/expenses/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/expenses/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/expenses/css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="../assets/expenses/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/expenses/css/custom.css">
    <!-- <link rel="stylesheet" type="text/css" href="../assets/expenses/css/responsive.css"> -->
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

  <script type="text/javascript" src="<?php echo $server; ?>/assets/expenses/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $server; ?>/assets/expenses/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo $server; ?>/assets/expenses/js/angular.min.js"></script>
  <script type="text/javascript" src="<?php echo $server; ?>/assets/expenses/js/angular-ui-router.min.js"></script>
  <script type="text/javascript" src="<?php echo $server; ?>/assets/expenses/js/angular-local-storage.min.js"></script>
  <script type="text/javascript" src="<?php echo $server; ?>/assets/expenses/process/app.js"></script>

  <script type="text/javascript" src="<?php echo $server; ?>/assets/expenses/process/controllers/mainController.js"></script>

  <script type="text/javascript" src="<?php echo $server; ?>/assets/expenses/process/directives/mapDirective.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOzaOYgvdwnATwVIvSpYixj32rTLbVF3k"></script>
</html>