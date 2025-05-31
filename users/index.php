<?php
session_start();
include('../users/header.php');
?>

<main class="main-title-container" role="main">
    <h1 class="main-title">Posts</h1>
</main>

<section class="card-container" aria-label="List of Pet Posts">
    <?php
    include('../connect.php');
    $selectQuery = "SELECT * FROM post";
    $result = mysqli_query($connection, $selectQuery);
    
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <article class="card" aria-labelledby="post-title-<?php echo $row['id']; ?>">
                <div class="card-image">
                    <?php if (!empty($row['pet_image'])): ?>
                        <img src="../uploaded_images/<?php echo htmlspecialchars($row['pet_image']); ?>"
                             alt="Image of <?php echo htmlspecialchars($row['title']); ?>"
                             loading="lazy">
                    <?php else: ?>
                        <img src="../images/placeholder.jpg"
                             alt="No image available for this post"
                             loading="lazy">
                    <?php endif; ?>
                </div>

                <div class="card-content">
                    <h2 class="card-title" id="post-title-<?php echo $row['id']; ?>">
                        <?php echo htmlspecialchars($row['title']); ?>
                    </h2>
                    <p class="card-text"><?php echo htmlspecialchars($row['summary']); ?></p>
                    <p class="card-text">Published: <?php echo htmlspecialchars($row['date']); ?></p>

                    <div class="action-buttons" role="group" aria-label="Post Actions">
                        <?php
                        $id = $_SESSION['user_id'];
                        $userQuery = "SELECT * FROM users WHERE id = $id";
                        $userResult = mysqli_query($connection, $userQuery);
                        $userRow = mysqli_fetch_array($userResult);
                        ?>

                        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $row['user_id'] && $userRow["accepted"] == true): ?>
                            <a href="../users/edit.php?id=<?php echo $row['id']; ?>"
                               class="btn btn-edit"
                               role="button"
                               aria-label="Edit post titled <?php echo htmlspecialchars($row['title']); ?>">
                               Edit
                            </a>

                            <a href="../users/delete.php?id=<?php echo $row['id']; ?>"
                               class="btn btn-delete"
                               role="button"
                               aria-label="Delete post titled <?php echo htmlspecialchars($row['title']); ?>">
                               Delete
                            </a>
                        <?php endif; ?>

                        <a href="../users/view.php?id=<?php echo $row['id']; ?>"
                           class="btn btn-view"
                           role="button"
                           aria-label="View details of post titled <?php echo htmlspecialchars($row['title']); ?>">
                           View
                        </a>
                    </div>
                </div>
            </article>
            <?php
        }
    } else {
        echo "<p>Error loading posts: " . htmlspecialchars(mysqli_error($connection)) . "</p>";
    }
    ?>
</section>

<link rel="stylesheet" href="../css/index.css">
<?php include('footer.php'); ?>
