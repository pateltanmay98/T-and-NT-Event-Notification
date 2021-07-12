<?php
    session_start();
    $userid = $_SESSION['id'];
    $conn = new mysqli("localhost","root","","eventmain");
    $qry1 = "SELECT * FROM event_master ORDER BY id DESC;";
    $event = mysqli_query($conn,$qry1);
    if($event === false)
    {
        echo "Error: ".$qry1."</br>".$conn->error;
    }
    $qry2 = "select fname,lname from student_registration WHERE id='".$userid."';";
    $name = mysqli_query($conn,$qry2);
    if($name === false)
    {
        echo "Error: ".$qry2."</br>".$conn->error;
    }
?>
<html>
    <head>
        <title>Home_Student</title>
        <link rel="stylesheet" type="text/css" href="style/student.css">
    </head>
    <body>
        <div id="main">
            <div id="header">
                <div id="logo">
                    <h1>
                        <?php
                            $row1 = mysqli_fetch_row($name);
                            echo "Welcome ".$row1[0]." ".$row1[1];
                        ?>
                    </h1>
                </div>
                <div id="menubar">
                    <ul id="menu">
                        <li class="current"><a href="StudentHome.php">Event List</a></li>
                        <li><a href="StudentMyEvent.php">My Events</a></li>
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
                            <a href="StudentViewEvent.php?eventid= <?php echo $row1['id']; ?>">
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