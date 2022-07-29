<?php
session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email']; //finish this line
    $password = $_POST['password'];//finish this

loginUser($email, $password);

}

function loginUser($email, $password){
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */
    $file = fopen('../storage/users.csv', 'r');
    while(!feof($file)){
        $line = fgetcsv($file);
        if($line[1] == $email && $line[2] == $password){
            $_SESSION['username'] = $line[0];
            header("Location: ../dashboard.php");
            exit();

        }
    }
    echo "<h2 style='color: red;'>Invalid Username or Password</h2>";
    fclose($file);
}

