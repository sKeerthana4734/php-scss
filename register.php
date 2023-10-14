<?php
require 'function.php';
if(isset($_SESSION["id"])){
  header("Location: profile.php");
}
if(isset($_SESSION["register"]) && isset($_SESSION["message"])){
  header("Location: index.php");
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
  <div class="container">
    <h1>SIGN UP</h1>
    <div id="error"></div><br>
    <form autocomplete="off" action="" method="post">
      <input type="hidden" id="action" value="register">
      <label for="">Name</label>
      <input type="text" id="name" value=""> <br>
      <label for="">Username</label>
      <input type="text" id="username" value=""> <br>
      <label for="">Password</label>
      <input type="password" id="password" value=""> <br>
      <button type="button" onclick="submitData();">SIGN UP</button>
    </form>
    <br>
    <p>Already registered? <span><a href="index.php">Sign In</a></span></p>
    <?php require 'script.php'; ?>
    </div>
</body>
</html>