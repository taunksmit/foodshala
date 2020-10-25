<main role="main">
  
  <br>
  <div class="container marketing"> <?php echo $this->session->flashdata('msg'); ?>
    <div class="row featurette">
      <?php foreach ($dishes as $row) { ?>
        <div class="card   col-md-3">
          <img class="card-img-top " src="<?php echo base_url() . $row['picture'] ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title <?php echo $row['dish_type']; ?>"><?php echo ucwords($row['food_name']) ?></h5>
            <p class="card-text"><i class="fas fa-map-marker" aria-hidden="true"></i> <?php echo ucwords($row['res_name']); ?>
              <span class="text-right" style="float: right;"><i class="fas fa-star"></i><?php echo (rand(0, 5)) ?>/5</span></p>
            <p class="card-text">Serves: <?php echo $row['serves']; ?> 
            <span class="text-right" style="float: right;">Cost: <i class="fa fa-inr"> </i> <?php echo $row['cost'] ?></span>
          </p>
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