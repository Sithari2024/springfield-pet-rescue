<?php include('../admin/header.php');
session_start();
?>

<div class="card-container">
    <?php
    include('../connect.php');
    $selectQuery = "SELECT * FROM post";
    $result = mysqli_query($connection, $selectQuery);
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="card">
                <div class="card-image">
                    <?php if (!empty($row['pet_image'])): ?>
                        <img src="../uploaded_images/<?php echo htmlspecialchars($row['pet_image']); ?>" alt="Pet Image">
                    <?php else: ?>
                        <img src="../images/placeholder.jpg" alt="No Image Available">
                    <?php endif; ?>
                </div>
                <div class="card-content">
                    <h2 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h2>
                    <p class="card-text"><?php echo htmlspecialchars($row['summary']); ?></p>
                    <p class="card-text">Published: <?php echo htmlspecialchars($row['date']); ?></p>
                    <div class="action-buttons">

                        <?php $id=$row['user_id']; $temp_select_Query = "SELECT accepted from users WHERE id = '$id'";?>
                        <?php $accepted_value = mysqli_query($connection, $temp_select_Query);?>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="../users/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-delete">Delete</a>
                        <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-view">View</a>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }
    ?>
</div>

<link rel="stylesheet" href="../css/index.css">
</body>

</html>
<?php include 'footer.php'; ?>