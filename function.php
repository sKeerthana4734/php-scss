<?php
session_start();
$conn = mysqli_connect("localhost", "root", "4321", "guvi");

// IF
if(isset($_POST["action"])){
  if($_POST["action"] == "register"){
    register();
  }
  else if($_POST["action"] == "login"){
    login();
  }
  else if($_POST["action"]== "save"){
    save();
  }
}

// REGISTER
function register(){
  global $conn;

  $name = $_POST["name"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  if(empty($name) || empty($username) || empty($password)){
    echo "Please Fill Out The Form!";
    exit;
  }

  $user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
  if(mysqli_num_rows($user) > 0){
    echo "Username Has Already Taken";
    exit;
  }

  $query = "INSERT INTO users (name, username, password) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "sss", $name, $username, $password);
  if($stmt){
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_close($stmt);
        echo "Registration Successful";
        $_SESSION["register"] = true;
        $_SESSION["message"]="Registration Successful. Please Login to Continue.";
        exit();
    }
  } else {
    echo "Registration Failed. Try again Later.";
  }
}

// LOGIN
function login(){
  global $conn;
  
  if(isset($_POST['username']) && isset($_POST['password']))
  {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if(empty($username)){
        echo "Username is Required";
        exit;
    }else if(empty($password)){
        echo "Password is Required";
        exit;
    }else{
        $user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

        if(mysqli_num_rows($user) > 0){

            $row = mysqli_fetch_assoc($user);

            if($password == $row['password']){
              $_SESSION['message']="Login Successful";
            echo "Login Successful";
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["index"];
            }
            else{
            echo "Wrong Password";
            exit;
            }
        }
        else{
            echo "User Not Registered";
            exit;
        }
    
    }
  }
}

function save(){
  global $conn;

  function isPostDataEmptyOrNull($postArray) {
    foreach ($postArray as $value) {
        if (empty($value) && !is_numeric($value)) {
            return true; 
        }
    }
    return false; 
}

if (isPostDataEmptyOrNull($_POST)) {
    echo "Please fill all the fields";
} else {
  $username = $_POST["username"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $age = $_POST["age"];
  $gender = $_POST["gender"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $country = $_POST["country"]; 
  $id = intval($_SESSION['id']);


  $query = "UPDATE users SET firstname = ?, lastname = ?, email = ?, age = ?, gender = ?, phone = ?, country = ? WHERE `index` = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "sssssssi", $firstname, $lastname, $email, $age, $gender, $phone, $country, $id);

  if($stmt){
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_close($stmt);
        echo "Saved Successfully";
        $_SESSION["save"] = true;
        $_SESSION['message']="Saved Successfully";
        exit();
    }
  } else {
    echo "Saved failed";
    exit();
  }
  }

}
?>