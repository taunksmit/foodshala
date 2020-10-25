<?php $type =  $this->session->login_session['user_type']; ?>
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
            <p class="col-md-12 lead">Order History</p>
            <div class="table-responsive">
                <table class="table table-hover   ">
                    <tbody>
                        <?php
                        if ($type == 'restaurants') {
                            echo 'Please Login as a customer';
                        } else {
                            if (!$all_orders) {
                                echo 'No items please browse all the dishes and add delicious food items to the cart ';
                            } else {
                                $i = $total_cost = 0;
                                foreach ($all_orders as $row) {
                                    $total_cost = $row->cost + $total_cost ?>
                                    <tr>
                                        <th scope="row"><?php echo ++$i; ?></th>
                                        <td>
                                            <span class=" <?php echo $row->dish_type ?> lead">
                                                <?php echo ucwords($row->food_name); ?></span>
                                            <br>from: <?php echo ucwords($row->res_name); ?></td>
                                        <td><i class="fa fas fa-inr"></i> <?php echo $row->cost; ?>/-</td>
                                        <td><?php echo $row->order_status; ?> at <?php echo $row->creation_dt; ?></td>
                                    </tr>
                                <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
<?php }
                        } ?>
    </div>
    <hr class="featurette-divider">