<?php
require 'function.php';
if(isset($_SESSION["id"])){
    $id = intval($_SESSION["id"]);
    $query = "SELECT * FROM users WHERE `index` = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    if($stmt)
    {
        if(mysqli_stmt_execute($stmt))
        {
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            if($row){
                $_SESSION['username']=$row['username'];
                $_SESSION['firstname']=$row['firstname'];
                $_SESSION['lastname']=$row['lastname'];
                $_SESSION['email']=$row['email'];
                $_SESSION['age']=$row['age'];
                $_SESSION['gender']=$row['gender'];
                $_SESSION['phone']=$row['phone'];
                $_SESSION['country']=$row['country'];
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conn);
    }
}

?>