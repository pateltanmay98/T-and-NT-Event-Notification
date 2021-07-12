<?php
    session_start();
    $collegeid = $_SESSION['id'];
    $conn1 = new mysqli("localhost","root","","eventmain");

    $qry1 = "select name from college_registration WHERE id='".$collegeid."';";
    $name = mysqli_query($conn1,$qry1);
    if($name === false)
    {
        echo "Error: ".$qry1."</br>".$conn1->error;
    }
    $row1 = mysqli_fetch_row($name);

    $qry2 = "SELECT * FROM event_master WHERE clgname='".$row1[0]."' ORDER BY id DESC;";
    $event = mysqli_query($conn1, $qry2);
    if($event === false)
    {
        echo "Error: ".$qry2."</br>".$conn1->error;
    }

?>
<html>
    <head>
        <title>Home_College</title>
        <link rel="stylesheet" type="text/css" href="style/college.css">
    </head>
    <body>
        <div id="main">
            <div id="header">
                <div id="logo">
                    <h1>
                        <?php
                            echo $row1[0];
                        ?>
                    </h1>
                </div>
                <div id="menubar">
                    <ul id="menu">
                        <li><a href="CollegeHome.php">Event List</a></li>
                        <li><a href="NewEvent1.php">Create Event</a></li>
                        <li class="current"><a href="CollegeMyEvents.php">My Events</li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div id="site_content">
                <div id="content">
                    <?php 
                        while($row2 = mysqli_fetch_array($event))
                        {
                    ?>
                    <div class="event_main">
                        <div class="event_title">
                            Event Name:
                            <?php
                                echo $row2['name'];
                            ?>
                        </div>
                        <div class="event_college_name">
                            College Name:
                            <?php
                                echo $row2['clgname'];
                            ?>
                        </div>
                        <div class="event_date">
                            Event Date:
                            <?php
                                echo $row2['date'];
                            ?>
                        </div>
                        <div class="event_view">
                        <a href="CollegeViewEvent.php?eventid= <?php echo $row2['id']; ?>&select=0">
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