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
    <div class="container-fluid showcase">
        
    </div>
    <!-- SHOWCASE ENDS -->


    
    <form class="text-white mx-auto mt-5 mb-5 p-5" action="" method="post">
    <h1>Signup</h1>

    <?php 
            
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
            
    ?>

    <div class="mb-3">
        <label for="" class="form-label">First Name</label>
        <input name="user_firstname" type="text" class="form-control" id="" aria-describedby="first_name" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Last Name</label>
        <input name="user_lastname" type="text" class="form-control" id="" aria-describedby="last_name" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email address</label>
        <input name="user_email" type="email" class="form-control" id="" aria-describedby="email" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input name="user_password" type="password" class="form-control" id="" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Re-enter Password</label>
        <input name="confirm_password" type="password" class="form-control" id="" required>
    </div>
    
    <button name="signup" type="submit" class="btn btn-primary">Signup</button>
    </form>


<?php include "includes/footer.php"; ?>   