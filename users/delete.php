<?php
$id = $_GET["id"];
if ($id) {
    include("../connect.php");
    $sqlDelete = "DELETE FROM post WHERE id = $id";
    if (mysqli_query($connection, $sqlDelete)) {
        session_start();
        $_SESSION["delete"] = "Post deleted successfully";
        header("Location:../users/index.php");
    } else {
        die("Something is not write. Data is not deleted");
    }
} else {
    echo "Post not found";
}
?>