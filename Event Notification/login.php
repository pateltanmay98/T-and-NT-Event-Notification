<?php
    session_start();
    $id=$_REQUEST['id'];
    $password=$_REQUEST['password'];
    $conn = new mysqli("localhost","root","","eventmain");

    $len=strlen((string)$id);

    if($len > 10)
    {
        $qry = "SELECT * FROM student_registration WHERE id='".$id."' AND password='".$password."' limit 1;";
        $res = mysqli_query($conn,$qry);
        if(mysqli_num_rows($res)==1)
	    {
		    header("Location: StudentHome.php");
            $_SESSION['id']=$id;
            exit;
        }
        else
        {
            echo "Wrong Information";
        }    
    }
    else
    {
        $qry = "SELECT * FROM college_registration WHERE id='".$id."' AND password='".$password."' limit 1;";
        $res = mysqli_query($conn,$qry);
        if(mysqli_num_rows($res)==1)
	    {
            header("Location: CollegeHome.php");
            $_SESSION['id']=$id;
            exit;
        }
        else
        {
            echo "Wrong Information";
        }
    }
?>