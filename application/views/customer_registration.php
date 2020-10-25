<main role="main">
  <br>
  <div class="container marketing">
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="pt-4 text-primary modal-title">Register </h2>
        <form class="" method="post" action="<?php echo site_url('Foodshala/add_user/') ?>" enctype="multipart/form-data">
          <input type="hidden" name="user_type" value="customers" class="form-control" placeholder="Contact" required>
          <div class="">
            <p class="text-small  ">Register and order delicious food</p>
            <?php echo $this->session->flashdata('msg'); ?>
          </div>
          <div class="form-row">
            <div class="form-label-group col-md-6">
              <input type="text" name="cust_name" class="form-control" placeholder="First Name" required>
              <label for="inputPassword"> Name</label>
            </div>
            <div class="form-label-group col-md-6">
              <input type="number" name="cust_contact" class="form-control" placeholder="Contact" required>
              <label for="inputPassword">Contact</label>
            </div>
          </div>
          <div class="form-row">
            <div class="form-label-group  col-md-6">
              <input type="email" name="cust_email" class="form-control" placeholder="Email" required>
              <label for="inputPassword">Email</label>
            </div>
            <div class="form-label-group col-md-6">
              <input type="password" name="cust_password" class="form-control" placeholder="Password" required>
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="mb-5 ml-2 mt-1 form-row">
            <div class="mr-5 custom-control custom-radio">
              <input type="radio" value="veg" id="customRadio1" name="food_choice" class="custom-control-input">
              <label class="custom-control-label" for="customRadio1">Veg</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" value="nonveg" id="customRadio2" name="food_choice" class="custom-control-input">
              <label class="custom-control-label" for="customRadio2">Non Veg</label>
            </div>
          </div>
          <button type="submit" class="text-center btn btn-block btn-primary">Register as a Customer</button>
        </form>
      </div>
      <div class="col-md-5">
        <img src="http://lorempixel.com/400/400/food/" alt="">
      </div>
    </div>
  </div>
  <hr class="featurette-divider">