<?php 

    include "includes/db.php";
    include "includes/header.php";

?>
    <title>Get Ya Grapes ๐ | Cart</title>
</head>
<body>
    <!-- NAVBAR -->
    <?php include "includes/nav.php"; ?>   

    <!-- SHOWCASE -->
    <div class="container-fluid showcase d-flex justify-content-center align-items-center">
      <h1 class="display-1 text-white">GET YA GRAPES</h1>
    </div>

    <?php 
    
    addUserInfo();
    
    ?>

    <!-- CHECKOUT -->
    <div class="container-fluid cart pb-5 text-white">
        <div class="row m-0 p-0">
            <div class="col m-0 p-0">
                <div class="container cart-div mt-5 pb-5">
                    <h1 class="text-white display-2 text-center pb-5">๐Checkout๐</h1>
                    <div class="row mt-5">

                        <div class="col-md-5">

                        <?php

                            $user_id = $_SESSION["user_id"];

                            $query = "SELECT * FROM users WHERE user_id = '$user_id' ";
                            $find_user_query = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($find_user_query)) {
                                $user_firstname = $row["user_firstname"];
                                $user_lastname = $row["user_lastname"];
                                $user_phone = $row["user_phone"];
                                $user_state = $row["user_state"];
                                $user_zip = $row["user_zip"];
                                $user_card = $row["user_card"];
                            }

                            if($user_phone) {
                                echo "<h1>Billing and Shipping details</h1>
                            
                                <div class='billing border rounded p-2 mb-2'>
                                <p><strong>First name</strong>: $user_lastname</p>
                                <p><strong>Last name</strong>: $user_lastname</p>
                                <p><strong>Phone</strong>: $user_phone</p>
                                <p><strong>State</strong>: $user_state</p>
                                <p><strong>Zipcode</strong>: $user_zip</p>
                                </div>
    
                                <h1>Payment method</h1>
                                <div class='payment border rounded p-2 mb-4'>
                                <p><strong>Credit card</strong>: $user_card</p>
                                </div>
    
                                <button type='submit' name='edit' class='btn btn-primary btn-lg mb-3'>Edit</button>
                                <button type='submit' name='submit' class='btn btn-warning btn-lg mb-3'>Checkout</button>
                                
                                
                                ";
                            }

                            if(!$user_phone) {
                                echo "<form action='' method='post'>
                                <div class='mb-3'>
                                    <label for='user_firstname' class='form-label'>Firstname</label>
                                    <input type='text' class='form-control' name='user_firstname'>
                                </div>
                                <div class='mb-3'>
                                    <label for='user_lastname' class='form-label'>Lastname</label>
                                    <input type='text' class='form-control' name='user_lastname'>
                                </div>
                                <div class='mb-3'>
                                    <label for='user_phone' class='form-label'>Phone number</label>
                                    <input type='tel' class='form-control' name='user_phone''>
                                </div>
                                <div class='mb-3'>
                                    <label for='user_state' class='form-label'>State</label>
                                    <input type='text' class='form-control' name='user_state'>
                                </div>
                                <div class='mb-5'>
                                    <label for='user_zipcode' class='form-label'>Zipcode</label>
                                    <input type='text' class='form-control' name='user_zip'>
                                </div>

                                <h1>Payment method</h1>
                                <div class='mb-3'>
                                    <label for='user_card' class='form-label'>Credit Card</label>
                                    <input type='text' class='form-control' name='user_card'>
                                </div>

                                <button type='submit' name='submit' class='btn btn-primary mb-3'>Submit</button>
                            </form>

                            ";


                            }
                        
                        ?>
                            
                        </div>

                        <div class="col-md-1"></div>

                        <div class="col-md-6">
                            <div class="col cart-items">
                                <div class="row cart-heading ">
                                    <div class="col text-center"></div>
                                    <div class="col text-center">Item name</div>
                                    <div class="col text-center">Item Price</div>
                                    <div class="col text-center">Item Quantity</div>
                                    <div class="col text-center">Item Amount</div>
                                </div>
                                <hr>

                                <?php 

                                $user_id = $_SESSION["user_id"];
                                $total_array = array();
                                
                                $query = "SELECT * FROM cart WHERE cart_user_id = $user_id ";
                                $get_cart_items_query = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_assoc($get_cart_items_query)) {
                                    $cart_item_id = $row["cart_item_id"];
                                    $cart_item_quantity = $row["cart_item_quantity"];

                                    $query = "SELECT * FROM inventory WHERE item_id = $cart_item_id ";
                                    $get_inventory_info_query = mysqli_query($conn, $query);

                                    while($row = mysqli_fetch_assoc($get_inventory_info_query)) {

                                        $cart_item_name = $row["item_name"];
                                        $cart_item_price = $row["item_price"];
                                        $cart_item_image = $row["item_image"];
                                        
                                        echo "<!-- CART ITEM -->
                                        <div class='row cart-item'>
                                            <div class='col'>
                                                <img src='media/shop/$cart_item_image' alt='' class='checkout-img'>
                                            </div>
                                            <div class='col m-auto text-center'>
                                                $cart_item_name
                                            </div>
                                            <div class='col m-auto text-center'>
                                                $$cart_item_price
                                            </div>
                                            <div class='col m-auto text-center'>
                                                $cart_item_quantity
                                            </div>
                                            <div class='col m-auto text-center'>";
                                                $item_amount = $cart_item_price*$cart_item_quantity;
                                                array_push($total_array, $item_amount);
                                                echo "$" . $item_amount;
                                            echo"</div>
                                        </div>
                                        ";

                                    }

                                }
                                
                                ?>
                                
                                <hr>

                                <div class='row cart-total'>
                                    <div class='col'><strong>Total</strong></div>
                                    <div class='col'></div>
                                    <div class='col'></div>
                                    <div class='col'></div>
                                    <div class='col text-center'>
                                        <?php
                                        echo "$" . array_sum($total_array);
                                        ?>
                                    </div>
                                </div>
                                
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
     
    </div>

            


         

<?php include "includes/footer.php"; ?>         
        
