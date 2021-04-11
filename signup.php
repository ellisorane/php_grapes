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


    
    <form class="text-white mx-auto mt-5 mb-5 p-5" action="" method="post">
    <h1>Signup</h1>

    <?php 
            
        signup();
            
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