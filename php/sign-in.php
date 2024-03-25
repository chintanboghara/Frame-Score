<?php
include('db.php');
session_start();
// When form submitted, check and create user session.
if (isset($_REQUEST['username'])) {
    $username = stripslashes($_REQUEST['username']); // removes backslashes
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    // Check user is exist in the database
    $query = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);
    echo "total" . $rows;
    if ($rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        // Redirect to user dashboard page
        header("Location: ../html/index.php");
    } else {
        echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='../html/sign-in.html'>Login</a> again.</p>
                  </div>";
    }
} else {
    include('sign-in.html');
}
