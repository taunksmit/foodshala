<main role="main">
    
    <br>
    <div class="container marketing">
        <div class="row featurette">
        <?php foreach ($restaurants as $row) { ?>
                <div class="card    col-md-4"  >
                    <img class="card-img-top" src="http://lorempixel.com/400/200/food/<?php echo rand(1,10) ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo ucwords($row['res_name']) ?></h5>
                        <p class="card-text"><i class="fas fa-map-marker" aria-hidden="true"></i> <?php echo ucwords($row['res_address']); ?> 
                        
                        <span class="text-right" style="float: right;"><i class="fas fa-star"></i><?php echo(rand(0,5))?>/5</span></p>
                        <a href="<?php echo site_url('Foodshala/restaurant/').$row['res_id']; ?>" class="mt-3 btn btn-outline-primary">Browse Dishes from  <?php echo ucwords($row['res_name']); ?></a>
                        
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>
    <hr class="featurette-divider">