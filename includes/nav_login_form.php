<?php include "db.php"; ?>

<form action='' method='post' class='d-flex'>
    <input class='form-control me-2' name='user_email' type='email' placeholder='email' aria-label='email' required>
    <input class='form-control me-2' name='user_password' type='password' placeholder='password' aria-label='password' required>
    <button class='btn btn-primary text-white p-2 m-1' id='login' name='login' type='submit'>Login</button>
    <a href='signup.php' class='btn btn-primary text-white p-2 m-1'>Signup</a>
</form>