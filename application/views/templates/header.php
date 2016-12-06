 
 <!DOCTYPE html>
<html lang="en"  ng-app='myApp'>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Poltry Indusrty  | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>theme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>theme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>theme/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="<?php echo base_url();?>theme/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>theme/build/css/custom.min.css" rel="stylesheet">

    <!-- my custom css -->
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet" >

    
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
     
 </head>

     <body class="nav-md">
      <div class="container " style="padding: 15px;">
        <div class="main_container" style="padding: 15px;">
          <?php if($this->session->userdata('username')){ ?>
         <!-- top navigation -->
          <div class="top_nav">
            <div class="nav_menu">
             
                <ul class="nav navbar-nav navbar-right">
                  <li >
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?php echo base_url();?>/images/shabir.jpg" alt=""><?php echo $this->session->userdata('username') ?>
                      <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                   
                      <li><a href="<?php echo site_url()?>/c_login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                      </li>
                    </ul>
                  </li>
                  
                   
                  </ul>
                  <!-- second ul -->
                  
                    <ul class="nav navbar-nav navbar-left"> 
               <li><a href="<?php echo site_url();?>/home/create_flock"><i class="fa fa-home"></i>Add New Flock</a>
                      </li>
                      <li ><a href="<?php echo site_url();?>/visit"><i style="background-color:green;" class="fa fa-home"></i>On Flock </a>
                       
                    </li>
                    <li ><a href="<?php echo site_url();?>/report"><i  class="fa fa-pencil"></i>Search </a>
                       
                    </li>
                    </ul>
               </div>
                </div>
                
              <?php }?>
           
                       
 