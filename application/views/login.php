<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Foodshala">
  <title>Sign In</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/floating-labels/">
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
</head>
<body>
  <div class="loader  ">
    <img src="<?php echo base_url('assets/loader.gif') ?>" class=" ">
  </div>
  <form class="form-signin" method="post" action="<?php echo site_url('Login/check_login/') ?>" enctype="multipart/form-data">
    <div class="text-center mb-4">
      <img class="mb-4" src="<?php echo base_url('assets/logo.png') ?>" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal text-primary">Login</h1>
      <p class="text-muted">Order and get closer to your food!</p>
    </div>
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="form-label-group">
      <input type="text" name="username" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputEmail">Username</label>
    </div>
    <div class="form-label-group">
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <label for="inputPassword">Password</label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login as Customer</button>
    <p class="mt-3     text-center"> Are You a Restaurant owner? <a href="<?php echo site_url('Login/rlogin/') ?>">Login here</a></p>
    <p class="mt-1     text-center"> Not a user yet? <a href="<?php echo site_url('Login/rregister/') ?>">Register here</a></p>
    <p class="mt-5 mb-3 text-muted text-center">&copy; Foodshala <?php echo date('Y') ?> </p>
  </form>
</body>
</html>