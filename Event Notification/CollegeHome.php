<?php
    session_start();
    $collegeid = $_SESSION['id'];
    $conn = new mysqli("localhost","root","","eventmain");
    $qry1 = "SELECT * FROM event_master ORDER BY id DESC;";
    $event = mysqli_query($conn, $qry1);
    if($event === false)
    {
        echo "Error: ".$qry1."</br>".$conn->error;
    }
    $qry2 = "select name from college_registration WHERE id='".$collegeid."';";
    $name = mysqli_query($conn,$qry2);
    if($name === false)
    {
        echo "Error: ".$qry2."</br>".$conn->error;
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
                            $row1 = mysqli_fetch_row($name);
                            echo "Welcome ".$row1[0];
                        ?>
                    </h1>
                </div>
                <div id="menubar">
                    <ul id="menu">
                        <li class="current"><a href="CollegeHome.php">Event List</a></li>
                        <li><a href="NewEvent1.php">Create Event</a></li>
                        <li><a href="CollegeMyEvents.php">My Events</li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div id="site_content">
                <div id="content">
                    <?php 
                        while($row1 = mysqli_fetch_array($event))
                        {
                    ?>
                    <div class="event_main">
                        <div class="event_title">
                            Event Name:
                            <?php
                                echo $row1['name'];
                            ?>
                        </div>
                        <div class="event_college_name">
                            College Name:
                            <?php
                                echo $row1['clgname'];
                            ?>
                        </div>
                        <div class="event_date">
                            Event Date:
                            <?php
                                echo $row1['date'];
                            ?>
                        </div>
                        <div class="event_view">
                        <a href="CollegeViewEvent.php?eventid= <?php echo $row1['id']; ?>&select=1">
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