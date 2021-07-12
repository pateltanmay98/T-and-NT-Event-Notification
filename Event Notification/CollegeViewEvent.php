<?php
    session_start();
    $collegeid=$_SESSION['id'];
    $conn1 = new mysqli("localhost","root","","eventmain");
    $conn2 = new mysqli("localhost","root","","event_info");
    $eventid=$_REQUEST['eventid'];

    $sel=$_REQUEST['select'];
    
    $qry1="SELECT * FROM event_master WHERE id=".$eventid.";";
    $show=mysqli_query($conn1,$qry1);
    if($show === false)
    {
        echo "Error: ".$qry1."</br>".$conn1->error;
    }
    $row=mysqli_fetch_row($show);


    $qry2="SELECT * FROM college_registration;";
    $fname=mysqli_query($conn1,$qry2);
    if($show === false)
    {
        echo "Error: ".$qry2."</br>".$conn1->error;
    }

    $row2=mysqli_fetch_row($fname);
    $collegefname=$row2[1];
    $collegetablename=$collegefname.$collegeid;

    // $eventid=$row[0];
    $eventclgid=$row[1];
    $eventname=$row[2];
    $eventtablename=$eventname.$eventclgid;

    // if(isset($_REQUEST['delete']))
    // {
    //     $qry3="DROP TABLE ".$eventtablename.";";
    //     $three=mysqli_query($conn2,$qry3);
    //     if($three === false)
    //     {
    //         echo "Error: ".$qry3."</br>".$conn2->error."</br>";
    //     }
    //     $qry4="DELETE FROM event_master WHERE id=".$eventid.";";
    //     $four=mysqli_query($conn1,$qry4);
    //     if($four === false)
    //     {
    //         echo "Error: ".$qry4."</br>".$conn1->error;
    //     }
    //     //header("Location: college_my_events.php");
    // }
?>
<html>
    <head>
        <title>View Event College</title>
        <link rel="stylesheet" type="text/css" href="style/ViewEvent.css">
    </head>
    <body>
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
            <?php
                if($sel == "1")
                {
                    ?>
                    <div class="event-green-btn">
                        <a href="CollegeHome.php">
                        <button class="event-btn-style">
                            Go Back
                        </button>
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <div class="event-green-btn">
                        <a href="CollegeUpdateEvent.php?eventid= <?php echo $row[0]; ?>">
                        <button class="event-btn-style">
                            Update Event
                        </button>
                    </div>
                    <div class="event-delete-btn">
                        <a href="CollegeDeleteEvent.php?eventid= <?php echo $row[0]; ?>">
                        <button class="eve-delbtn-style">
                            Delete Event
                        </button>
                    </div>
                    <?php
                }
                ?>
        </div>
    </body>
</html>