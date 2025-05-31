<?php 
include('../connect.php');
if(isset($_POST['id'])){$id = $_POST['id'];};
if(isset($_POST['submitButton'])){
		$deleteQuery = "DELETE FROM post WHERE id=$id";
		mysqli_query($connection, $deleteQuery);
        // header("Location: dashboard.php");
        // echo "<meta http-equiv='refresh' content='0'>";
		header("Refresh: 0");
	}

?>