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
            
            ?>
            <?php 
            
                if(!isset($_SESSION["user_email"])) {

                    echo "<form action='' method='post' class='d-flex'>
                        <input class='form-control me-2' name='user_email' type='email' placeholder='email' aria-label='email' required>
                        <input class='form-control me-2' name='user_password' type='password' placeholder='password' aria-label='password' required>
                        <button class='btn btn-primary text-white p-2 m-1' id='login' name='login' type='submit'>Login</button>
                        <a href='signup.php' class='btn btn-primary text-white p-2 m-1'>Signup</a>
                    </form>";

                } elseif (isset($_SESSION["user_email"])) {

                    echo "<li class='nav-item dropdown'>
                        <a class='btn btn-primary dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
                        echo $_SESSION["user_firstname"] . " " .  $_SESSION["user_lastname"];
                        echo "</a>
                        <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>
                        <li><a class='dropdown-item' href='#'>Profile</a></li>
                        <li><a class='dropdown-item' href='#'>Settings</a></li>
                        <li><hr class='dropdown-divider'></li>
                        <li><a class='dropdown-item' href='logout.php'>Logout</a></li>
                        </ul>
                    </li>";

                }
            
            ?>
            
        </div>
        
    </div>
</nav>
