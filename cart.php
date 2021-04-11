<?php 

    include "includes/db.php";
    include "includes/header.php";

?>
    <title>Get Ya Grapes 🍇 | Cart</title>
</head>
<body>
    <!-- NAVBAR STARTS -->
    <?php include "includes/nav.php"; ?>   
    <!-- NAVBAR ENDS -->

    <!-- SHOWCASE STARTS -->
    <div class="container-fluid showcase d-flex justify-content-center align-items-center">
      <h1 class="display-1 text-white">GET YA GRAPES</h1>
    </div>
    <!-- SHOWCASE ENDS -->

    <!-- CART START  -->
    <div class="container-fluid cart pb-5">
      <div class="row m-0 p-0">
          <div class="col m-0 p-0">
            <div class="container cart-div mt-5 pb-5">
                <h1 class="text-white display-2 text-center pb-5">🍇Cart🍇</h1>
                <div class="row mt-5">
                    
                <div class="col cart-items">
                    <!-- CART HEADING  -->
                    <div class="row cart-heading p-1">
                        <div class="col text-center"></div>
                        <div class="col text-center">Item name</div>
                        <div class="col text-center">Item Price</div>
                        <div class="col text-center">Item Quantity</div>
                        <div class="col text-center">Item Amount</div>
                    </div>
                    <hr>

                    <?php 

                    deleteCartItem();

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
                                    <img src='media/shop/$cart_item_image' alt='' class='cart-img'>
                                </div>
                                <div class='col m-auto text-center'>
                                    $cart_item_name
                                </div>
                                <div class='col m-auto text-center'>
                                    $$cart_item_price
                                </div>
                                <div class='col m-auto text-center'>
                                    $cart_item_quantity
                                    <a href='cart.php?delete_item=$cart_item_id' class='btn btn-danger btn-sm m-1'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                        <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                    </svg>
                                    </a>
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
                    <div class="row mt-5">
                        <a class='btn btn-warning btn-lg checkout'>Checkout</a>
                    </div>
                    
                </div>

                </div>
            </div>
          </div>
      </div>
     
    </div>
    <!-- CART END  -->

            


         

<?php include "includes/footer.php"; ?>         
        
