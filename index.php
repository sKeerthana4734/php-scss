<?php
require 'function.php';
if(isset($_SESSION["id"])){
  header("Location: profile.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./scss/styles.css">
</head>
<body>
  <div class="container">
    <h1>SIGN IN</h1>
    <div id="message">
      <?php
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      }
       ?>
    </div>
    <div id="error"></div><br>
    <form autocomplete="off" action="" method="post">
      <input type="hidden" id="action" value="login">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" value=""> 
      <label for="password">Password</label>
      <input type="password" id="password" name="password" value="">
      <div class="button-container">
      <button type="button" onclick="submitData();">Sign In</button>
      </div>
    </form>
    <br>
    <p>Don't have an account? <span><a href="register.php">Sign up</a></span></p>
    <?php require 'script.php'; ?>
    </div>
  </body>
</html>