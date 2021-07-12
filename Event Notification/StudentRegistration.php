<?php

    $enno=$_REQUEST['senrlno'];
    $fname=$_REQUEST['sfname'];
    $lname=$_REQUEST['slname'];
    $mobno=$_REQUEST['smobno'];
    $email=$_REQUEST['semail'];
    $clgename=$_REQUEST['sclgename'];
    $password=$_REQUEST['spassword1'];
    $uniqueid=$fname.$enno;

    $conn = new mysqli("localhost","root","","eventmain");

    $qry1="INSERT INTO student_registration (id, fname, lname, phno, email, clgname, password) VALUES ('".$enno."', '".$fname."', '".$lname."', '".$mobno."', '".$email."', '".$clgename."', '".$password."');";
    $insert=mysqli_query($conn, $qry1);

    if($insert === true)
    {
        $qry2="CREATE TABLE student_info.".$uniqueid." ( id INT(10) AUTO_INCREMENT PRIMARY KEY , eventid INT(10) NOT NULL , eventname VARCHAR(20) NOT NULL , eventcollege VARCHAR(30) NOT NULL , eventdate DATE NOT NULL , currenttime DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP );";
        $cretable=mysqli_query($conn, $qry2);
        if($cretable === true)
        {
            echo "Error: ".$qry2."</br>".$conn1->error;
        }

        $qry3="ALTER TABLE student_info.".$uniqueid." ADD CONSTRAINT fkeventid FOREIGN KEY ( eventid ) REFERENCES event_master ( id );";
        $addcons1=mysqli_query($conn, $qry3);
        if($addcons1 === false)
        {
            echo "Error: ".$qry3."</br>".$conn1->error;
        }
        header("Location: login.html");
    }
    else
    {
        echo "Error: ".$ins."</br>".$conn->error;
    }
    exit;
?>