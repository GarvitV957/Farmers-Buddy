<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
    //   die('Could not connect: ' . mysqli_error());
   }
   
   if(isset($_POST["phone"], $_POST["password"])) 
    {     

        $name = $_POST["phone"]; 
        $password = $_POST["password"]; 

        $result1 = mysqli_query($conn,"SELECT phone, password FROM abc.data WHERE phone = '".$name."' AND  password = '".$password."'");

        if(mysqli_num_rows($result1) > 0 )
        {
            $_SESSION["logged_in"] = true;
            $_SESSION["name"] = $name;
            header("Location: http://localhost/farmer's%20buddy/Frontend/index.html");
            exit();
        }
        else
        {
            echo 'The username or password are incorrect!';
        }

}
   mysqli_close($conn);
   ?>