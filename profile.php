<?php 
require 'data.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <div class="profile-container">
    
    <?php
    echo "<h1>Welcome " . $_SESSION['username'] . "</h1><br>";
    $fields = [
                'username' => 'Username',
                'firstname' => 'First Name',
                'lastname' => 'Last Name',
                'email' => 'Email',
                'age' => 'Age',
                'gender' => 'Gender',
                'phone' => 'Phone',
                'country' => 'Country'
            ];
            $stored=0;
    ?>
    
    <form action="" method="post">
        <div class="form-container">
            <div class="left-column">
                <input type="hidden" id="action" value="save">
                <?php
                $count = 0;
                foreach ($fields as $sessionKey => $label) {
                    $value = isset($_SESSION[$sessionKey]) ? $_SESSION[$sessionKey] : '';
                    if ($count % 2 == 0) {
                        echo '<label for="' . $sessionKey . '">' . $label . ':</label>';
                        echo '<input type="text" id="' . $sessionKey . '" name="' . $sessionKey . '" value="' . $value . '"';
                        if (isset($_SESSION[$sessionKey])) {
                            echo ' disabled';
                            $stored=$stored+1;
                        } else {
                            echo " placeholder='Please fill this field' required";
                        }
                        echo '><br>';
                    }
                    $count++;
                }
                ?>
                <div id="message">
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
                </div>
                <div id="error"></div>
            </div>
            <div class="right-column">
                <?php
                $count = 0;
                foreach ($fields as $sessionKey => $label) {
                    $value = isset($_SESSION[$sessionKey]) ? $_SESSION[$sessionKey] : '';
                    if ($count % 2 != 0) {
                        echo '<label for="' . $sessionKey . '">' . $label . ':</label>';
                        echo '<input type="text" id="' . $sessionKey . '" name="' . $sessionKey . '" value="' . $value . '"';
                        if (isset($_SESSION[$sessionKey])) {
                            echo ' disabled';
                            $stored=$stored+1;
                        } else {
                            echo " placeholder='Please fill this field'";
                        }
                        echo ' required><br>';
                    }
                    $count++;
                }
                ?>
                <?php if($stored!=8){ ?>
                <button type="button" onclick="saveData();" >Save</button>
                <?php }else{ ?>
                <button type="button" class='disable' disabled>Saved</button>
                <?php } ?><br>
                <a href="logout.php">Logout</a>
            </div>
        </div>   
    </form>
     
    
    <?php require 'script.php'; ?>
    </div>
</body>
</html>