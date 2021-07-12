<?php
    session_start();
    $collegeid=$_SESSION['id'];
    $conn1 = new mysqli("localhost","root","","eventmain");
    $conn2 = new mysqli("localhost","root","","event_info");
    $eventid=$_REQUEST['eventid'];

    $qry1="SELECT * FROM event_master WHERE id=".$eventid.";";
    $show=mysqli_query($conn1,$qry1);
    if($show === false)
    {
        echo "Error: ".$qry1."</br>".$conn1->error;
    }
    $row=mysqli_fetch_row($show);

    $eventclgid=$row[1];
    $eventname=$row[2];
    $eventtablename=$eventname.$eventclgid;

    $qry2="DROP TABLE ".$eventtablename.";";
    $two=mysqli_query($conn2,$qry2);
    if($two === false)
    {
        echo "Error: ".$qry2."</br>".$conn2->error."</br>";
    }
    $qry3="DELETE FROM event_master WHERE id=".$eventid.";";
    $three=mysqli_query($conn1,$qry3);
    if($three === false)
    {
        echo "Error: ".$qry3."</br>".$conn1->error;
    }
    header("Location: CollegeMyEvents.php");
?>