<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //retrieve from data
    $username = $_POST['user'];
    $password = $_POST['password'];

    // database connection
    
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "auth";

    $con = new mysql($host,$dbusername,$dbpassword,$dbname);

    if($conn->connect_error){
        die("connection failed:". $con->connect_error);

    }


    //validate login aunthentication
    $query ="SELECT *FROM login WHERRE username='$username' AND password='$password';
    $result = $conn->query($query);

    if($result->num_row ==1{
         header("Location: success.html");
         exit();
    }     
    else{
        header("Location: error.html");
        exit();
    }
    
    $conn->close();

}

?>