<?php include "db.php"; ?>

<li class='nav-item dropdown m-1'>
    <a class='btn btn-primary dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
    <?php echo $_SESSION["user_firstname"] . " " .  $_SESSION["user_lastname"] ; ?>
    </a>
    <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>
    <li><a class='dropdown-item' href='#'>Profile</a></li>
    <li><a class='dropdown-item' href='#'>Settings</a></li>
    <li><hr class='dropdown-divider'></li>
    <li><a class='dropdown-item' href='logout.php'>Logout</a></li>
    </ul>
</li>

<li class='nav-item m-1'>
<a class='btn btn-primary' href='cart.php'>
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg>
    <i class="fas fa-shopping-cart"></i>
    <span class="cart-item-amount">
        <?php 

        $user_id = $_SESSION["user_id"];

        $query = "SELECT * FROM cart WHERE cart_user_id = $user_id ";
        $get_cart_amount_query = mysqli_query($conn, $query);

        $occurences = array();

        while($row = mysqli_fetch_assoc($get_cart_amount_query)) {
            $cart_item_id = $row["cart_item_id"];

            if(!in_array($cart_item_id, $occurences)) {
                array_push($occurences, $cart_item_id);
            }
            
        }

        print_r(count($occurences));

        ?>
    </span>
</a>
</li>