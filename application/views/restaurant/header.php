<!DOCTYPE html>
<html lang="en">
<?php
$name = $this->session->login_session['name'];
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>FoodShala - Admin Area</title>
  <!-- Fontawesome core CSS -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/css/simple-sidebar.css'); ?>" rel="stylesheet">
</head>
<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class=" bg-light border-right" id="sidebar-wrapper">
      <div class="text-center 	sidebar-heading">FoodShala </div>
      <div class="text-center text-small"> </div>
      <br>
      <div class="list-group list-group-flush">
        <a href="<?php echo site_url('Foodshala/dashboard') ?>" class=" <?php if ($this->uri->segment_array()[2] == 'dashboard')  echo 'active'; ?>  list-group-item list-group-item-action  "><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
        <a href="<?php echo site_url('Foodshala/orders/') ?>" class="<?php if ($this->uri->segment_array()[2] == 'orders') echo 'active'; ?> list-group-item list-group-item-action  "><i class="fa fa-files-o" aria-hidden="true"></i> Orders</a>
        <a href="<?php echo site_url('Foodshala/menu/') ?>" class=" <?php if ($this->uri->segment_array()[2] == 'menu') echo 'active'; ?> list-group-item list-group-item-action  "> <i class="fa fa-eye" aria-hidden="true"></i> View Full Menu</a>
        <a href="<?php echo site_url('Foodshala/add_food/') ?>" class="<?php if ($this->uri->segment_array()[2] == 'add_food') echo 'active'; ?> list-group-item list-group-item-action  "><i class="fa fa-plus" aria-hidden="true"></i> Add Food Items</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn btn-primary" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i> </button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <span class=" ">
                Hello <?php echo $name; ?> <span class="sr-only">(current)</span>
              </span>
              <a class="ml-5 " href="<?php echo site_url('Login/logout'); ?>"><i class="fa fa-power-off" aria-hidden="true"></i> </a>
            </li>
          </ul>
        </div>
      </nav>