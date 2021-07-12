<?php
    session_start();
    $userid = $_SESSION['id'];
    $conn = new mysqli("localhost","root","","eventmain");

    $eventid  = $_REQUEST['eid'];    
    $eventinfo = $_REQUEST['einformation'];
    $eventtype = $_REQUEST['etype'];
    $eventdate = $_REQUEST['edate'];
    $eventlastdate = $_REQUEST['elastdate'];
    $eventfees = $_REQUEST['efee'];

	// $qry1 = "UPDATE event_master SET information = '".$eventinfo."', type = '".$eventtype."', date = '".$eventdate."', lastdate = '".$eventlastdate."', fee = '".$eventtype."' WHERE id = '".$eventid."';";
	$qry1="UPDATE event_master SET information = '".$eventinfo."', type = '".$eventtype."', date = '".$eventdate."', lastdate = '".$eventlastdate."', fee = '".$eventfees."' WHERE id = ".$eventid.";";
	$update = mysqli_query($conn, $qry1);
	if($update === false)
    {
        echo "Error: ".$qry1."</br>".$conn->error;
	}
	header("Location: CollegeMyEvents.php");
?>