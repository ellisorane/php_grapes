<?php 

    include "includes/db.php";
    include "includes/header.php";

?>
    <title>Get Ya Grapes 🍇 | Shop</title>
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

    <!-- SHOP START  -->
    <div class="container-fluid shop pb-5">
      <div class="row">
          <div class="col">
            <div class="container shop-div mt-5 pb-5">
                <h1 class="text-white display-2 text-center pb-5">🍇Shop🍇</h1>
                <div class="row shop-row mt-5">
                    
                <?php

                    addToCart();
            
                    // GRAB HOT GRAPES 
                    $query = "SELECT * FROM inventory ";
                    $get_hot_grapes = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($get_hot_grapes)) {
                        $item_id = $row["item_id"];
                        $item_name = $row["item_name"];
                        $item_origin = $row["item_origin"];
                        $item_type = $row["item_type"];
                        $item_price = $row["item_price"];
                        $item_stock_level = $row["item_stock_level"];
                        $item_image = $row["item_image"];
                        $item_hot = $row["item_hot"];

                        if($item_stock_level != 0) {

                            echo "<div class='col-md-4 mb-4'>
                                <div class='hot-grape-item'>
                                <div class='row'>
                                    <div class='col grape-img-col d-flex justify-content-center mt-4'>
                                    <img class='grape-img' src='media/shop/$item_image' alt=''>
                                    </div>
                                </div>
                                <div class='grape-info'>
                                    <p class='grape-name'>$item_name <span class='grape-price float-end'>$$item_price</span></p>
                                    <hr>
                                    <p class='type'>Seed type: $item_type</p>
                                    <p class='grape-country'>Country: $item_origin</p>
                                    <div class='row'>
                                    <div class='col'>
                                        <p class='float-start'>Quantity</p>
                                    </div>
                                    <div class='col'>
                                        <form action='' method='post'>
                                        <input name='item_id' class='d-none' value='$item_id' >
                                        <select class='grape-quantity' name='item_quantity'>";
                                        $i = 1;
                                        while($i <= $item_stock_level) {
                                            echo "<option value='$i'>$i</option>";
                                            $i++;
                                        }
                                        echo"</select>
                                        </div>
                                        <div class='col'>
                                        <button class='btn btn-primary' type='submit' name='add'>Add to Cart</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>  
                                </div>
                            </div>";

                        } else {
                            //OUT OF STOCK ITEM
                            echo "<div class='col-md-4 mb-4'>
                                <div class='hot-grape-item'>
                                <div class='row'>
                                    <div class='col grape-img-col d-flex justify-content-center mt-4'>
                                    <img class='grape-img' src='media/shop/$item_image' alt=''>
                                    </div>
                                    <h1 class='text-center'>Out of Stock</h1>

                                </div>
                                <div class='grape-info'>
                                    <p class='grape-name'>$item_name <span class='grape-price float-end'>$$item_price</span></p>
                                    <hr>
                                    <p class='type'>Seed type: $item_type</p>
                                    <p class='grape-country'>Country: $item_origin</p>
                                    <div class='row'>
                                    <div class='col'>
                                        <p class='float-start'>Quantity</p>
                                    </div>
                                    <div class='col'>
                                        <select class='grape-quantity'>
                                            <option value='0'>0</option>
                                    </select>
                                    </div>
                                    <div class='col'>
                                        <button class='btn btn-primary' disabled='true'>Add to Cart</button>
                                    </div>
                                    </div>
                                </div>  
                                </div>
                            </div>";

                        }

                    }
                    
                ?>

                </div>
            </div>
          </div>
      </div>
     
    </div>
    <!-- SHOP END  -->

         

<?php include "includes/footer.php"; ?>   