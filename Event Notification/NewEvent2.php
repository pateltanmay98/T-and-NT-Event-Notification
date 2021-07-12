<?php
    session_start();
    $userid = $_SESSION['id'];
    $conn = new mysqli("localhost","root","","eventmain");
    $qry1 = "select id,name from college_registration WHERE id='".$userid."';";
    $name = mysqli_query($conn,$qry1);
    if($name === false)
    {
        echo "Error: ".$qry1."</br>".$conn->error;
    }
    $row1 = mysqli_fetch_row($name);
    $evclgid = $row1[0];
    $evclgname = $row1[1];
    $evname = $_REQUEST['ename'];
    $evinformation = $_REQUEST['einformation'];
    $evtype = $_REQUEST['etype'];
    $evdate = $_REQUEST['edate'];
    $evlastdate = $_REQUEST['elastdate'];
    $evfee = $_REQUEST['efee'];

    $uniqueid=$evname.$evclgid;
    
    $qry2 = "INSERT INTO event_master (clgid, name, information, type, date, lastdate, clgname, fee) VALUES ('".$evclgid."', '".$evname."', '".$evinformation."', '".$evtype."', '".$evdate."', '".$evlastdate."', '".$evclgname."', '".$evfee."');";
    $insert = mysqli_query($conn,$qry2);
    
    if($insert === true)
    {

        $qry3="CREATE TABLE event_info.".$uniqueid." ( id INT(10) AUTO_INCREMENT PRIMARY KEY , studentid BIGINT(12) NOT NULL , eventid INT(10) NOT NULL , eventcollegeid INT(10) NOT NULL);";
        $createtable=mysqli_query($conn, $qry3);

        $qry4="ALTER TABLE event_info.".$uniqueid." ADD CONSTRAINT fkstudentid FOREIGN KEY ( studentid ) REFERENCES student_registration ( id );";
        $addcons1=mysqli_query($conn, $qry4);

        $qry5="ALTER TABLE event_info.".$uniqueid." ADD CONSTRAINT fkeventid FOREIGN KEY ( eventid ) REFERENCES event_master ( id );";
        $addcons1=mysqli_query($conn, $qry5);

        $qry6="ALTER TABLE event_info.".$uniqueid." ADD CONSTRAINT fkeventclgid FOREIGN KEY ( eventcollegeid ) REFERENCES event_master ( clgid );";
        $addcons1=mysqli_query($conn, $qry6);

        header("Location: CollegeHome.php");
        exit;
    }
    else
    {
        echo "Error: ".$qry2."</br>".$conn->error;
    }
    
?>