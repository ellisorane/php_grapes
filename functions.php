<?php 

include "includes/db.php";

function signup () {

    global $conn;

    $can_signup = true; 
    if(isset($_POST["signup"])) {
        $user_firstname = mysqli_real_escape_string($conn, $_POST["user_firstname"]);
        $user_lastname = mysqli_real_escape_string($conn, $_POST["user_lastname"]);
        $user_email = mysqli_real_escape_string($conn, $_POST["user_email"]);
        $user_password = mysqli_real_escape_string($conn, $_POST["user_password"]);
        $confirm_password = mysqli_real_escape_string($conn, $_POST["confirm_password"]);

        $query = "SELECT randSalt FROM users"; 
        $get_randSalt_query = mysqli_query($conn, $query);

        $saltRow = mysqli_fetch_assoc($get_randSalt_query);
        $salt = $saltRow["randSalt"];

        //FORM VALIDATION
        if(strlen($user_password) < 8) {

            echo "<p class='text-warning'>Password needs to be longer than 7 characters.</p>";
            $can_signup = false;

        }

        if($user_password != $confirm_password) {

            echo "<p class='text-warning'>Passwords don't match.</p>";
            $can_signup = false;

        }

        $query = "SELECT * FROM users ";
        $get_all_users_query = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($get_all_users_query)) {

            $db_emails = $row["user_email"];

            if($user_email === $db_emails) {

                echo "<p class='text-warning'>Account with this email already exists</p>"; 
                $can_signup = false;

            }

        }

        if($can_signup) {

            //ENCRYPT PASSWORD
            $user_password = crypt($user_password, $salt);
            $confirm_password = crypt($confirm_password, $salt);

            //INSERT DATA INTO DB
            $query = "INSERT INTO users (user_firstname, user_lastname, user_email, user_password) ";
            $query .= "VALUES('$user_firstname', '$user_lastname', '$user_email', '$user_password') ";

            $signup_query = mysqli_query($conn, $query);

            if(!$signup_query) {
                echo "Error: " . mysqli_error($conn);
            }

            echo "<p class='text-info'>Account successfully created</p>";


        }

    }

}

function login () {

    global $conn;

    if(isset($_POST["login"])) {

        $user_exists = false;

        $user_email = mysqli_real_escape_string($conn, $_POST["user_email"]);
        $user_password = mysqli_real_escape_string($conn, $_POST["user_password"]);

        $query = "SELECT * FROM users ";
        $get_all_users_query = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($get_all_users_query)) {

            $db_user_email = $row["user_email"];

            if($user_email === $db_user_email) {

                $user_exists = true;

                $query = "SELECT * FROM users WHERE user_email = '$user_email' ";
                $find_user_query = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($find_user_query)) {

                    $db_user_id = $row["user_id"];
                    $db_user_email = $row["user_email"];
                    $db_user_password = $row["user_password"];
                    $db_user_firstname = $row["user_firstname"];
                    $db_user_lastname = $row["user_lastname"];
                    $db_user_phone = $row["user_phone"];
                    $db_user_zip = $row["user_zip"];
                    $db_user_city = $row["user_city"];
                    $db_user_state = $row["user_state"];
                    $db_user_steet_address = $row["user_street_address"];

                }

                $user_password = crypt($user_password, $db_user_password);

                 // PWD VALIDATION
                if($user_password != $db_user_password) {
                    echo "<li class='nav-item text-warning m-2'>Incorrect password</li>";
                }

                if($user_email === $db_user_email && $user_password === $db_user_password) {
                    $_SESSION["user_id"] = $db_user_id;
                    $_SESSION["user_email"] = $db_user_email;
                    $_SESSION["user_password"] = $db_user_password;
                    $_SESSION["user_firstname"] = $db_user_firstname;
                    $_SESSION["user_lastname"] = $db_user_lastname;
                    $_SESSION["user_phone"] = $db_user_phone;
                    $_SESSION["user_zip"] = $db_user_zip;
                    $_SESSION["user_city"] = $db_user_city;
                    $_SESSION["user_state"] = $db_user_state;
                    $_SESSION["user_steet_address"] = $db_user_steet_address;

                }

            }

        }
        
        if(!$user_exists) {
            echo "<li class='nav-item text-warning m-2'>Account doesn't exists. Try signing up.</li>";
        }

    }

}

function addToCart () {

    global $conn;

    if(isset($_POST["add"])) {

        $user_id = $_SESSION["user_id"];
        $grape_quantity = $_POST["item_quantity"];
        $item_id = $_POST["item_id"];

        $query = "INSERT INTO cart (cart_item_id, cart_user_id, cart_item_quantity) ";
        $query .= "VALUES($item_id, $user_id, $grape_quantity) ";

        $add_to_cart_query = mysqli_query($conn, $query);

        if(!$add_to_cart_query) {
            echo mysqli_error($conn);
        }

        header("Refresh:0");

    }
}

function deleteCartItem() {
    global $conn;

    $query = "SELECT * FROM cart";
    $retrieve_cart = mysqli_query($conn, $query);

    if(isset($_GET["delete_item"])) {

        $item_id = $_GET["delete_item"];

        $query = "DELETE FROM cart WHERE cart_item_id = $item_id";
        $delete_from_cart_query = mysqli_query($conn, $query);

        header("Location: cart.php");

    }
}