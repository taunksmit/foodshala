<main role="main">
  
  <br>
  <style>
    .veg {
      color: green;
    }
    .non-veg {
      color: red;
    }
  </style>
  <div class="container marketing">
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="row featurette">
      <div class="col-md-12 jumbotron">
        <h1 class="display-4"><?php echo ucwords($details[0]['res_name']) ?> </h1>
        <p class="lead">
        </p>
        <hr class="my-4">
        <p><i class="fas fa-map-marker" aria-hidden="true"></i> <?php echo ucwords($details[0]['res_address']); ?>
          <span class="text-right" style="float: right;"><i class="fas fa-star"></i><?php echo (rand(0, 5)) ?>/5</span>
        </p>
        <p><i class="fas fa-phone" aria-hidden="true"></i> <?php echo $details[0]['res_contact']; ?>
          <span class="text-right" style="float: right;">Orders Served: <?php echo (rand(10, 1000)) ?></span>
        </p>
      </div>
      <p class="col-md-12 lead"> Menu</p>
      <?php
      if (!$dishes) {
        echo ('Restaurant isn\'t offering any food as of now. Please check later. &nbsp; &nbsp; &nbsp; &nbsp; ');
      ?>
        <a class=" " href="<?php echo site_url('Foodshala/dishes'); ?>"> Browse All Dishes </a>
        <a class="ml-5 " href="<?php echo site_url('Foodshala/restaurants'); ?>">Browse other Restaurants </a>
      <?php
      }
      foreach ($dishes as $row) { ?>
        <div class="card   col-md-3">
          <img class="card-img-top" src="<?php echo base_url().$row['picture']; ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title <?php echo $row['dish_type']; ?>"><?php echo ucwords($row['food_name']) ?></h5>
            <span class="text-right" style="float: right;"><i class="fas fa-star"></i><?php echo (rand(0, 5)) ?>/5</span></p>
            <p class="card-text">Serves: <?php echo $row['serves']; ?> </p>
            <?php if (!$this->session->login_session) {
            ?>
              <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#exampleModalLong"> Login to Order </button>
              <?php } else {
              $type =  $this->session->login_session['user_type'];
              if ($type == "restaurants") { ?>
                <span class="  small">Please Login as customer to order</span>
              <?php } else { ?>
                <a href="<?php echo site_url('Foodshala/add_to_cart/') . $row['food_id']; ?>" class="mt-3 btn btn-block btn-primary">Add to Cart</a>
            <?php }
            } ?>
          </div>
        </div>
      <?php
      } ?>
    </div>
  </div>
  <hr class="featurette-divider">