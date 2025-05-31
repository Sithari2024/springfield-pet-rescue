<?php 
include('../connect.php');
$id = $_POST['id'];
if(isset($_POST['submitButton'])){
		$deleteQuery = "DELETE FROM message WHERE id=$id";
		mysqli_query($connection, $deleteQuery);
        header("Location: message.php");
        // echo "<meta http-equiv='refresh' content='0'>";
	}

?>