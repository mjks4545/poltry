<!DOCTYPE html>
<html lang="en" ng-app='myApp'>

<head>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    
    <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap-3.3.6/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>css/font-awesome-4.6.3/css/font-awesome.min.css" />
  
  
    <link rel="icon" href="<?php echo base_url() ?>/images/favicon.ico" type="image/x-icon" />
    
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>css/admin.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<section id="top_manu">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Edwork | Admin Panel</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="#">Dashboard</a></li>
          <li><a href="<?php echo site_url('admin/Teachers'); ?>">Teachers</a></li>
          <li><a href="<?php echo site_url('admin/Subjects'); ?>">Subjects</a></li>
          <li><a href="#">Page 3</a></li> 
        </ul>
      </div>
    </nav>
</section>

<section id="wrapper">
    <!-- /. main container -->
    <div class="container">
    
    