<main role="main">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img width="100" height="100" src="<?php echo base_url(); ?>assets/images/back1.png" alt="">
        <rect width="100%" height="100%" fill="#777" /></svg>
        <div class="container">
          <div class="carousel-caption">
            <h1 class="text-primary">FoodShala</h1>
            <p class="text-secondary">Eat delicious food daily at your doorstep!</p>
            <a class="mr-2 btn btn-lg btn-primary" href="<?php echo site_url('Foodshala/dishes'); ?>" role="button">See All Dishes</a>
            <a class="btn btn-lg btn-outline-primary" href="<?php echo site_url('Foodshala/restaurants'); ?>" role="button">See All Restaurants</a>
          </div>
        </div>
      </div>
      <div class="carousel-item  ">
        <img width="100" height="100" src="<?php echo base_url(); ?>assets/images/back1.png" alt="">
        <rect width="100%" height="100%" fill="#777" /></svg>
        <div class="container">
          <div class="carousel-caption">
            <h1 class="text-primary">Tired of doing all day long WFH?</h1>
            <p class="text-secondary">Order from the safest restaurants following the safety
              standards<br> and enjoy a warm meal in no time. </p>
             
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img width="100" height="100" src="<?php echo base_url(); ?>assets/images/back1.png" alt="">
        <div class="container">
          <div class="carousel-caption">
            <h1 class="text-primary">No Time to Cook?</h1>
            <p class="text-secondary"> Order your favorite dish from choicest restaurants, and enjoy
              your meal</p>
             
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
 
  <div class="container marketing">
    <?php echo $this->session->flashdata('msg'); ?>
    <style>
      .box {
        width: 100%;
        height: 50%;
        ;
      }
    </style>
    <p class="text-center lead">Featured Dishes </p>
    <?php foreach ($food as $row) {
    ?>
      
      <div class="  " style="min-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="<?php echo base_url() . $row['picture'] ?>" class="card-img card-img-top">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h2 class="text-secondary "><i class="<?php echo $row['dish_type']; ?> fas fa-circle"></i> <?php echo ucwords($row['food_name']); ?> <p class="text-muted float-right large ml-5"><i class="fa fa-inr"> </i> <?php echo $row['cost'] ?></p></h2>
              <p class="card-text"><small class="text-muted ">Last ordered <?php echo rand(1, 20) ?> mins ago</small></p>
              
              <?php if (!$this->session->login_session) {
              ?>
                <button type="button" class="btn mt-5 btn-outline-primary" data-toggle="modal" data-target="#exampleModalLong"> Login to Order </button>
                <?php } else {
                $type =  $this->session->login_session['user_type'];
                if ($type == "restaurants") { ?>
                  <span class="  small">Please Login as customer to order</span>
                <?php } else { ?>
                  <a href="<?php echo site_url('Foodshala/add_to_cart/') . $row['food_id']; ?>" class="mt-3 btn   btn-outline-primary">Add to Cart</a>
              <?php }
              } ?>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    
  </div>
  <hr class="featurette-divider">