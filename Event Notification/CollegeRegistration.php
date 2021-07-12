<?php
    $id=$_REQUEST['cid'];
    $name=$_REQUEST['cname'];
    $mobno=$_REQUEST['cmobno'];
    $email=$_REQUEST['cemail'];
    $password=$_REQUEST['cpassword1'];
    $conn = new mysqli("localhost","root","","eventmain");
    $ins="INSERT INTO college_registration (id, name, phno, email, password) VALUES ('".$id."', '".$name."', '".$mobno."', '".$email."', '".$password."');";
    if(mysqli_query($conn, $ins) === true)
    {
        header("Location: login.html");
    }
    else
    {
        echo "Error: ".$ins."</br>".$conn->error;
    }
    exit;
?>