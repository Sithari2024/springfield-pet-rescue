<?php 
include('../connect.php');
if(isset($_POST['id'])){$id = $_POST['id'];};
if(isset($_POST['submitButton1'])){
        if($_POST['submitButton1'] == 'Accept')
            {$value = 1;}
            else if($_POST['submitButton1'] == 'Reject')
                {$value = 0;}
		$updateQuery = "UPDATE users set accepted=$value WHERE id=$id";
        mysqli_query($connection, $updateQuery);
        // header("Location: dashboard.php");
        // echo "<meta http-equiv='refresh' content='0'>";
        header("Refresh: 0");
	}

?>