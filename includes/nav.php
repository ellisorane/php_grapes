<nav class="navbar navbar-expand-lg navbar-dark p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">🍇</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
            

            <?php 
            
                login();

                if(!isset($_SESSION["user_email"])) {

                    include "includes/nav_login_form.php";

                } elseif (isset($_SESSION["user_email"])) {

                    include "includes/nav_acc_cart.php";

                }
            
            ?>
            
        </div>
        
    </div>
</nav>
