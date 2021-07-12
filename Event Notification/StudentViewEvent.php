<?php
    session_start();
    $studentid=$_SESSION['id'];

    $conn1 = new mysqli("localhost","root","","eventmain");
    $conn2 = new mysqli("localhost","root","","event_info");
    $conn3 = new mysqli("localhost","root","","student_info");
    $eventid=$_REQUEST['eventid'];

    $qry1="SELECT * FROM event_master WHERE id=".$eventid.";";
    $show=mysqli_query($conn1,$qry1);
    if($show === false)
    {
        echo "Error: ".$qry1."</br>".$conn1->error;
    }
    $row=mysqli_fetch_row($show);


    $qry2="SELECT * FROM student_registration;";
    $fname=mysqli_query($conn1,$qry2);
    if($show === false)
    {
        echo "Error: ".$qry2."</br>".$conn1->error;
    }

    $row2=mysqli_fetch_row($fname);
    $studentfname=$row2[1];
    $studenttablename=$studentfname.$studentid;

    $eventid=$row[0];
    $eventclgid=$row[1];
    $eventname=$row[2];
    $eventclgname=$row[7];
    $eventdate=$row[5];
    $eventtablename=$eventname.$eventclgid;

    $qry5="SELECT studentid FROM event_info.".$eventtablename." WHERE studentid=".$studentid.";";
    $fifth=mysqli_query($conn2,$qry5);
    $row2=mysqli_fetch_row($fifth);
    $studenteventinfo=$row2[0];

    if(isset($_REQUEST['submit']))
    {

        if($studentid == $studenteventinfo)
        {
            echo "Record already submitted!";
        }
        else
        {
            $qry3="INSERT INTO event_info.".$eventtablename." ( studentid, eventid, eventcollegeid ) VALUES ('".$studentid."', '".$eventid."',  '".$eventclgid."');";
            
            $eventrecord=mysqli_query($conn2,$qry3);
            if($eventrecord === false)
            {
                echo "Error: ".$qry3."</br>".$conn2->error;
            }

            // $qry4="INSERT INTO student_info.".$studenttablename." ( eventid, eventclgid ) VALUES ('".$eventid."',  '".$eventclgid."');";
            $qry4="INSERT INTO student_info.".$studenttablename." (id, eventid, eventname, eventcollege, eventdate, currenttime) VALUES (NULL, '".$eventid."', '".$eventname."', '".$eventclgname."', '".$eventdate."', CURRENT_TIMESTAMP);";
            $studentrecord=mysqli_query($conn3,$qry4);
            if($studentrecord === false)
            {
                echo "Error: ".$qry4."</br>".$conn3->error."</br>";
            }
        }
    }

    if(isset($_REQUEST['delete']))
    {
        if($studentid == $studenteventinfo)
        {
            $qry6="DELETE FROM event_info.".$eventtablename." WHERE studentid=".$studentid.";";
            $six=mysqli_query($conn2,$qry6);
            if($six === false)
            {
                echo "Error: ".$qry6."</br>".$conn2->error."</br>";
            }

            $qry7="DELETE FROM student_info.".$studenttablename." WHERE eventid=".$eventid.";";
            $seven=mysqli_query($conn3,$qry7);
            if($six === false)
            {
                echo "Error: ".$qry7."</br>".$conn3->error."</br>";
            }
        }
        else
        {
            echo "You are not registered";
        }
    }
?>
<html>
    <head>
        <title>View Event Student</title>
        <link rel="stylesheet" type="text/css" href="style/ViewEvent.css">
    </head>
    <body>
    <form action="" method="post">
        <div class="event-main">
            <div class="event-title">
                Event Name:
                <?php
                    echo $row[2];
                ?>
            </div>
            <div class="event-info">
                Event Information:
                <?php
                    echo $row[3];
                ?>
            </div>
            <div class="event-type">
                Event Type:
                <?php
                    echo $row[4];
                ?>
            </div>
            <div class="event-college-name">
                College Name:
                <?php
                    echo $row[7];
                ?>
            </div>
            <div class="event-date">
                Event Date:
                <?php
                    echo $row[5];
                ?>
            </div>
            <div class="event-lastdate">
                Last Registration Date:
                <?php
                    echo $row[6];
                ?>
            </div>
            <div class="event-fees">
                Event Fees:
                <?php
                    echo $row[8];
                ?>
            </div>
            <div class="event-green-btn">
                <input type="submit" name="submit" value="submit" class="event-btn-style" />
            </div>
            <div class="event-delete-btn">
                <input type="submit" name="delete" value="delete" class="eve-delbtn-style" />
            </div>
        </div>
    </form>
    </body>
</html>