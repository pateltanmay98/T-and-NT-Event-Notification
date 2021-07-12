<?php
    session_start();
    $studentid = $_SESSION['id'];
    $conn1 = new mysqli("localhost","root","","eventmain");

    $conn2 = new mysqli("localhost","root","","student_info");
    
    $qry1 = "SELECT fname,lname FROM student_registration WHERE id='".$studentid."';";
    $first = mysqli_query($conn1,$qry1);
    if($first === false)
    {
        echo "Error: ".$qry1."</br>".$conn1->error;
    }
    $row1 = mysqli_fetch_row($first);
    
    $fname = $row1[0];

    $studentnewid = $fname.$studentid;

    $qry3 = "SELECT * FROM student_info.".$studentnewid." ORDER BY id ASC;";
    $third = mysqli_query($conn1,$qry3);
    if($third === false)
    {
        echo "Error: ".$qry3."</br>".$conn1->error;
        echo "Yoy are not registered in any event!";
    }

    // $qry2 = "SELECT eventid FROM ".$studentnewid.";";
    // $second = mysqli_query($conn2,$qry2);
    // if($second === false)
    // {
    //     echo "Error: ".$qry2."</br>".$conn1->error;
    // }
    // $row2 = mysqli_fetch_row($second);
    // $studenteventid = $row2[0];

?>

<html>
    <head>
        <title>My Events</title>
        <link rel="stylesheet" type="text/css" href="style/student.css">
    </head>
    <body>
        <div id="main">
            <div id="header">
                <div id="logo">
                    <h1>
                        <?php
                            echo $row1[0]." ".$row1[1];
                        ?>
                    </h1>
                </div>
                <div id="menubar">
                    <ul id="menu">
                        <li><a href="StudentHome.php">Event List</a></li>
                        <li class="current"><a href="StudentMyEvent.php">My Events</a></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div id="site_content">
                <div id="content">
                    <?php 
                        while($row3 = mysqli_fetch_array($third))
                        {
                    ?>
                    <div class="event_main">
                        <div class="event_title">
                            <?php
                                echo $row3[2];
                            ?>
                        </div>
                        <div class="event_college_name">
                            <?php
                                echo $row3[3];
                            ?>
                        </div>
                        <div class="event_date">
                            <?php
                                echo $row3[4];
                            ?>
                        </div>
                        <div class="event_view">
                            <a href="StudentViewEvent.php?eventid= <?php echo $row3['id']; ?>">
                            <button class="eve-btn-style">
                                More Detail
                            </button>
                            </a>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>