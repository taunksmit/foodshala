 <!doctype html>
 <html lang="en">
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
     <meta name="generator" content="Jekyll v4.1.1">
     <title>Foodshala by Smit Taunk</title>
     <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/carousel/">
     <!-- Bootstrap core CSS -->
     <script src="https://kit.fontawesome.com/27c4f4a8c2.js" crossorigin="anonymous"></script>
     <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
     <style>
         
         .bd-placeholder-img {
             font-size: 1.125rem;
             text-anchor: middle;
             -webkit-user-select: none;
             -moz-user-select: none;
             -ms-user-select: none;
             user-select: none;
         }
         @media (min-width: 768px) {
             .bd-placeholder-img-lg {
                 font-size: 3.5rem;
             }
         }
     </style>
     <!-- Custom styles for this template -->
     <link href="<?php echo base_url(); ?>assets/css/carousel.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
 </head>
 <body>
     <header>
         <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary" style="padding-bottom: 10px; padding-top: 10px;">
             <a class="navbar-brand" href="<?php echo base_url(); ?>">FoodShala</a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarCollapse">
                 <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                         <a class="nav-link" href="<?php echo site_url('Foodshala/dishes'); ?>">All Dishes </a>
                     </li>
                     <li class="nav-item active">
                         <a class="nav-link" href="<?php echo site_url('Foodshala/restaurants'); ?>">All Restaurants </a>
                     </li>
                     
                 </ul>
                
                 <?php
                    if (!$this->session->login_session) { ?>
                     <i data-placement="left" data-toggle="tooltip" title="Login to aaccess the cart!"><i class="fa text-success fa-lg fa-shopping-cart"></i></i>
                     &nbsp;&nbsp; &nbsp;&nbsp;
                     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong"> Login </button> &nbsp; &nbsp;
                     <div class="dropdown">
                         <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Register
                         </button>
                         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                             <a href="<?php echo site_url('Foodshala/customer_registration'); ?>" class="dropdown-item">Customer</a>
                             <a href="<?php echo site_url('Foodshala/restaurant_registration'); ?>" class="dropdown-item">Restaurant</a>
                         </div>
                     </div> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                 <?php } else {
                        $type =  $this->session->login_session['user_type'];
                    ?>
                     <a href="<?php echo site_url('Foodshala/cart/') ?>" data-placement="left" data-toggle="tooltip" title="Checkout!"><i class="fa text-success fa-lg fa-shopping-cart"></i></a>
                     &nbsp;&nbsp; &nbsp;&nbsp;
                     <span class="text-light">Hello, <?php echo $this->session->login_session['name'];  ?>
                         <?php if ($type == "restaurants") { ?>
                             <a role="button" class="ml-3 btn btn-success btn-sm " onclick="return confirm('Are you sure?')" href="<?php echo site_url('Foodshala/dashboard/') ?>"> Go to Dashboard </a> <?php } else { ?>
                                <a class="btn" href="<?php echo site_url('Foodshala/all_orders/') ?>">Your orders</a>

                                <?php } ?>
                         <a role="button" class="ml-3 btn btn-outline-success btn-sm " onclick="return confirm('Are you sure?')" href="<?php echo site_url('Login/logout/') ?>"> Logout </a>
                     <?php } ?>
                     &nbsp; &nbsp;
             </div>
         </nav>
         
         </nav>
     </header>
     <div class="loader  ">
         <img src="<?php echo base_url('assets/images/loader.gif') ?>" class=" ">
     </div>