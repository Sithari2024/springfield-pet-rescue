<?php include 'header.php'; ?>


<div class="main-title-container">
    <h1 class="main-title">POSTS</h1>
</div>
<div class="card-container">
    <?php
    include 'connect.php';
    //extracting the data
    $sqlSelect = "SELECT * FROM post"; 
    $result = mysqli_query($connection, $sqlSelect); 
    //check for the data
    if ($result) {
        while ($data = mysqli_fetch_array($result)) {
            ?>
            <div class="card">
                <div class="card-image">
                    <?php if (!empty($data['pet_image'])): ?>
                        <img src="uploaded_images/<?php echo htmlspecialchars($data['pet_image']); ?>" alt="Pet Image">
                    <?php else: ?>
                        <img src="images/placeholder.jpg" alt="No Image Available">
                    <?php endif; ?>
                </div>
<!-- output the data-->
                <div class="card-content">
                    <h2 class="card-title"><?php echo htmlspecialchars($data['title']); ?></h2>
                    <p class="card-text">Published: <?php echo htmlspecialchars($data['date']); ?></p>
                    <p class="card-text">District: <?php echo htmlspecialchars($data['district']); ?></p>
                    <strong><p class="card-text"><?php echo htmlspecialchars($data['summary']); ?></p></strong>
                    
                    
                    <div class="action-buttons">
                        <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-view">View</a>
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

<link rel="stylesheet" href="./css/home.css">

<?php include('footer.php'); ?>