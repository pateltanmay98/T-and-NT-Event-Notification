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
?>
<html>
    <head>
        <title>College Update Event</title>
        <link rel="stylesheet" type="text/css" href="style/ViewEvent.css">
        <style>
            input[type="text"],
			input[type="textarea"],
			input[type="date"],
			input[type="email"] {
				box-sizing: border-box;
				margin-bottom: 20px;
				padding: 4px;
				width: 500px;
				height: 25px;
				border: none;
				border-bottom: 1px solid #AAA;
				font-family: 'Times New Roman';
				font-weight: 400;
				font-size: 15px;
				transition: 0.2s ease;
			}
			input[type="text"]:focus,
			input[type="textarea"]:focus,
			input[type="date"]:focus,
			input[type="email"]:focus {
				border-bottom: 2px solid #16a085;
				color: #16a085;
				transition: 0.2s ease;
			}
			input[type="submit"] {
				margin-top: 350px;
				width: 150px;
				height: 32px;
				background: #16a085;
				border: none;
				border-radius: 2px;
				color: #FFF;
				font-family: 'Times New Roman';
				font-weight: 500;
				text-transform: uppercase;
				transition: 0.1s ease;
				cursor: pointer;
			}
			input[type="submit"]:hover,
			input[type="submit"]:focus {
				opacity: 0.8;
				box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
				transition: 0.1s ease;
			}
			input[type="submit"]:active {
				opacity: 1;
				box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
				transition: 0.1s ease;
			}
        </style>
    </head>
    <body>
        <form action="UpdateEvent.php" method="POST">
			<input type="hidden" name="eid" value=
				<?php
					echo $eventid
				?>
			/>
            <div class="event-main" style="height:450px;">
				<div class="event-title">
					Event Name:
					<?php
						echo $row[2];
					?>
				</div>
                <div class="event-info">
                    Event Information:
						<input type="textarea" name="einformation" />
                </div>
  	            <div class="event-type">
                    Event Type:
                    <input type="text" style="width:575px;" name="etype" />
				</div>
				<div class="event-date" style="margin-top:287px;">
                	Event Date:
                	<input type="text" style="width:78px;" name="edate" pattern="(?:19|20)(?:(?:[13579][26]|[02468][048])-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))|(?:[0-9]{2}-(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31)))" />
            	</div>
				<div class="event-lastdate" style="margin-top:287px;">
					Last Registration Date:
					<input type="text" style="width:78px;" name="elastdate" pattern="(?:19|20)(?:(?:[13579][26]|[02468][048])-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))|(?:[0-9]{2}-(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31)))" />
				</div>
				<div class="event-fees" style="margin-top:287px;">
					Event Fees:
					<input type="text" style="width:90px;" name="efee" />
				</div>
				<input type="submit" name="submit" value="Update" />
			</div>
		</form>
	</body>
</html>