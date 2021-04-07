<?php 

    include "includes/db.php";
    include "includes/header.php";

?>
    <title>Get Ya Grapes 🍇 | Homepage</title>
</head>
<body>
    <!-- NAVBAR STARTS -->
    <?php include "includes/nav.php"; ?>   
    <!-- NAVBAR ENDS -->

    <!-- SHOWCASE STARTS -->
    <div class="container-fluid showcase">
        
    </div>
    <!-- SHOWCASE ENDS -->

    <!-- HOT GRAPES STARTS -->
    <div class="container hot-grapes mt-5 mb-5 pb-5 d-flex justify-content-center">
        <h1 class="text-white text-center display-2 pb-5">🍇Hottest Selling Grapes🍇</h1>
        <div class="row hot-grapes-row p-3">
            <!-- DISPLAY HOT GRAPES -->

            <?php
            
            // GRAB HOT GRAPES 
            $query = "SELECT * FROM inventory WHERE item_hot = 'yes' ";
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
                        <select class='grape-quantity";
                        $i = 0;
                        while($i <= $item_stock_level) {
                            echo "<option value='$i'>$i</option>";
                            $i++;
                        }
                        echo"</select>
                      </div>
                      <div class='col'>
                        <buttton class='btn btn-primary'>Add to Cart</buttton>
                      </div>
                    </div>
                  </div>  
                </div>
            </div>";


            }
            
            ?>


            <!-- GRAPE ITEM COL START  -->
            <!-- <div class="col-md-4 mb-4">
                <div class="hot-grape-item">
                  <div class="row ">
                    <div class="col grape-img-col d-flex justify-content-center mt-4">
                      <img class="grape-img" src="media/shop/lionGrapes.jpg" alt="">
                    </div>
                  </div>
                  <div class="grape-info">
                    <p class="grape-name">Magic Grape <span class="grape-price float-end">$20.00</span></p>
                    <hr>
                    <p class="type">Seed type: Seedless</p>
                    <p class="grape-country">Country: USA</p>
                    <div class="row">
                      <div class="col">
                        <p class="float-start">Quantity</p>
                      </div>
                      <div class="col">
                        <select class="grape-quantity">
                          <option value="1">1</option>
                          <option value="1">2</option>
                          <option value="1">3</option>
                          <option value="1">4</option>
                        </select>
                      </div>
                      <div class="col">
                        <buttton class="btn btn-primary">Add to Cart</buttton>
                      </div>
                    </div>
                  </div>  
                </div>
            </div> -->
            <!-- GRAPE ITEM COL END  -->
        </div>
        <div class="see-more-div text-center">
          <a href="Shop.php" class="btn btn-primary btn-lg see-more">Shop</a>
        </div>
    </div>
    <!-- HOT GRAPES END -->

    <!-- MORE ABOUT OUR GRAPES START  -->
    <div class="container-fluid about-our-grapes pb-5">
     
      <div class="row">
        <div class="col">
          <div class="container about-our-grapes-info-div mt-5">
            <h1 class="text-white display-2 text-center pb-5">🍇About our Grapes🍇</h1>
            <p class="about-our-grapes-info text-white">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Porta non pulvinar neque laoreet suspendisse interdum consectetur 
              libero id. Elit eget gravida cum sociis natoque penatibus. Porta non pulvinar neque laoreet. Amet mauris commodo quis imperdiet massa tincidunt nunc pulvinar sapien. Euismod elementum nisi quis
               eleifend quam adipiscing. Rhoncus mattis rhoncus urna neque viverra justo nec. Ante metus dictum at tempor commodo ullamcorper. Orci nulla pellentesque dignissim enim sit.<br> Adipiscing enim eu turpis 
               egestas pretium aenean pharetra. Nec sagittis aliquam malesuada bibendum arcu vitae elementum curabitur vitae. In tellus integer feugiat scelerisque varius morbi enim. Neque aliquam vestibulum morbi 
               blandit cursus risus at. Tempus iaculis urna id volutpat lacus. Risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Ut etiam sit amet nisl purus in mollis.
              Accumsan sit amet nulla facilisi morbi tempus iaculis urna. Donec ac odio tempor orci dapibus ultrices. Pulvinar elementum integer enim neque volutpat ac. Euismod elementum nisi quis eleifend 
              quam adipiscing vitae proin sagittis. Sollicitudin nibh sit amet commodo nulla facilisi. Dictumst quisque sagittis purus sit. Tincidunt lobortis feugiat vivamus at augue eget arcu dictum. 
              Dui vivamus arcu felis bibendum ut tristique et. Risus viverra adipiscing at in tellus. Enim sed faucibus turpis in.<br> Dapibus ultrices in iaculis nunc sed augue lacus viverra. Aliquam sem et tortor 
              consequat id porta nibh. Commodo ullamcorper a lacus vestibulum. Diam maecenas sed enim ut sem viverra. Duis at tellus at urna condimentum mattis pellentesque id nibh. Posuere ac ut consequat semper 
              viverra nam. Dui ut ornare lectus sit amet. Nisl suscipit adipiscing bibendum est ultricies integer. Convallis tellus id interdum velit <a class="learn-more" href="about.php">......Learn More🍇</a>
            </p>
            
          </div>
        </div>
      </div>
     
    </div>
    <!-- MORE ABOUT OUR GRAPES END  -->

<?php include "includes/footer.php"; ?>   