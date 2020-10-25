<main role="main">
  
  <br>
  <div class="container marketing">
    <div class="row featurette">
      <div class="col-md-5">
        <img src="http://lorempixel.com/400/400/food/" alt="">
      </div>
      <div class="col-md-7">
        <h2 class="pt-4 text-primary modal-title">Register </h2>
        <form class="" method="post" action="<?php echo site_url('Foodshala/add_user/') ?>" enctype="multipart/form-data">
          <input type="hidden"  readonly name="user_type" value="restaurants" class="form-control" placeholder="Contact" required>
          <div class="">
            <p class="text-small  ">Manage your food and menu</p>
            <?php echo $this->session->flashdata('msg'); ?>
          </div>
          <div class="form-row">
            <div class="form-label-group col-md-6">
              <input type="text" name="res_owner" class="form-control" placeholder="First Name" required>
              <label for="inputPassword"> Name</label>
            </div>
            <div class="form-label-group col-md-6">
              <input type="number" name="res_contact" class="form-control" placeholder="Contact" required>
              <label for="inputPassword">Contact</label>
            </div>
          </div>
          <div class="form-row">
            <div class="form-label-group  col-md-6">
              <input type="email" name="res_email" class="form-control" placeholder="Email" required>
              <label for="inputPassword">Email</label>
            </div>
            <div class="form-label-group col-md-6">
              <input type="password" name="res_password" class="form-control" placeholder="Password" required>
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-row">
          </div>
          <div class="form-label-group">
            <input type="text" name="res_name" class="form-control" placeholder="Address" required>
            <label for="inputPassword">Restaurant Name</label>
          </div>
          <div class="form-label-group">
            <input type="text" name="res_address" class="form-control" placeholder="Address" required>
            <label for="inputPassword">Address</label>
          </div>
          <button type="submit" class="text-center btn btn-block btn-primary">Register as a Restaurant Owner</button>
        </form>
      </div>
    </div>
  </div>
  <hr class="featurette-divider">