<?php
include('../users/header.php');
?>
<div class="post-container">
    <?php
    $id = $_GET["id"];
    if ($id) {
        include("../connect.php");
        $sqlSelectPost = "SELECT * FROM post WHERE id = ?";
        $stmt = mysqli_prepare($connection, $sqlSelectPost);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_array($result)) {
            ?>
            <article class="post">
                <header class="post-header">
                    <h1 class="post-title"><?php echo htmlspecialchars($row['title']); ?></h1>
                   
                </header>
                <div class="post-content">
                    <?php if (!empty($row['pet_image'])): ?>
                        <div class="image-container">
                            <img src="../uploaded_images/<?php echo htmlspecialchars($row['pet_image']); ?>" alt="Pet Image"
                                class="pet-image">
                        </div>
                    <?php endif; ?>
                    <time class="post-date">Posted on <?php echo htmlspecialchars($row['date']); ?></time>
                    <p class="post-district">District: <?php echo htmlspecialchars($row['district']); ?></p>
                    <p class="post-contact">Contact: <?php echo htmlspecialchars($row['contact']); ?></p>
                    <p class="post-summary"><?php echo htmlspecialchars($row['summary']); ?></p>
                    <div class="post-body"><?php echo nl2br(htmlspecialchars($row['content'])); ?></div>
                </div>
            </article>
            <?php
        } else {
            echo "<p class='error-message'>Post Not Found</p>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<p class='error-message'>Post Not Found</p>";
    }
    ?>
</div>
<link rel="stylesheet" href="../css/view.css">
<?php
include('footer.php');
?>