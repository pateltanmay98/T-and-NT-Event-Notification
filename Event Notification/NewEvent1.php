<?php
    session_start();
    $collegeid = $_SESSION['id'];
    $conn = new mysqli("localhost","root","","eventmain");
    $qry1 = "select name from college_registration WHERE id='".$collegeid."';";
    $name = mysqli_query($conn,$qry1);
    if($name === false)
    {
        echo "Error: ".$ins."</br>".$conn->error;
    }
?>

<html>
    <head>
        <title>New Event</title>
        <link rel="stylesheet" type="text/css" href="style/college.css">
    </head>

    <body>
        <div id="main">
            <div id="header">
            <div id="logo">
                    <h1>
                        <?php
                            $row1 = mysqli_fetch_row($name);
                            echo $row1[0];
                        ?>
                    </h1>
                </div>
                <div id="menubar">
                    <ul id="menu">
                        <li><a href="CollegeHome.php">Event List</a></li>
                        <li class="current"><a href="NewEvent1.php">Create Event</a></li>
                        <li><a href="CollegeMyEvents.php">My Events</li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div id="site_content">
                <div id="content">
                    <form action="NewEvent2.php" method="POST" class="frm_div">
                        <div class="div-new-eve">
                            <h1>Create Event</h1>
                            <input type="text" name="ename" placeholder="Event Name" />
                            <input type="textarea" name="einformation" placeholder="Event Information" />
                            <input type="text" name="etype" placeholder="Event Type" />
                            <input type="text" name="edate" placeholder="Enter Date(YYYY-MM-DD)" pattern="(?:19|20)(?:(?:[13579][26]|[02468][048])-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))|(?:[0-9]{2}-(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31)))" />
                            <input type="text" name="elastdate" placeholder="Last Registration Date(YYYY-MM-DD)" pattern="(?:19|20)(?:(?:[13579][26]|[02468][048])-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))|(?:[0-9]{2}-(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31)))" />
                            <input type="text" name="efee" placeholder="Enter Fees" />
                            <input type="submit" name="newevent" value="Create Event" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>