<?php include('../users/header.php'); ?>

<?php
$id = $_GET['id'];
include('../connect.php');
$sqlEdit = "SELECT * FROM post WHERE id = $id";
$result = mysqli_query($connection, $sqlEdit);
?>

<div class="dashboard-container">
    <h1>Edit Post</h1> 
    <form action="../users/process.php" method="post" enctype="multipart/form-data">
        <?php
        while ($data = mysqli_fetch_array($result)) {
            ?>
            <div class="form-field">
                <select name="title" id="title" required>
                    <option value="">Select Post Type</option>
                    <option value="Adopt" <?php echo ($data['title'] == 'Adopt') ? 'selected' : ''; ?>>Adopt</option>
                    <option value="Rehome" <?php echo ($data['title'] == 'Rehome') ? 'selected' : ''; ?>>Rehome</option>
                </select>
                <select name="district" id="district" required>
                    <option value="">Select District</option>
                    <option value="Ampara" <?php echo ($data['district'] == 'Ampara') ? 'selected' : ''; ?>>Ampara</option>
                    <option value="Anuradhapura" <?php echo ($data['district'] == 'Anuradhapura') ? 'selected' : ''; ?>>Anuradhapura</option>
                    <option value="Badulla" <?php echo ($data['district'] == 'Badulla') ? 'selected' : ''; ?>>Badulla</option>
                    <option value="Batticaloa" <?php echo ($data['district'] == 'Batticaloa') ? 'selected' : ''; ?>>Batticaloa</option>
                    <option value="Colombo" <?php echo ($data['district'] == 'Colombo') ? 'selected' : ''; ?>>Colombo</option>
                    <option value="Galle" <?php echo ($data['district'] == 'Galle') ? 'selected' : ''; ?>>Galle</option>
                    <option value="Gampaha" <?php echo ($data['district'] == 'Gampaha') ? 'selected' : ''; ?>>Gampaha</option>
                    <option value="Hambantota" <?php echo ($data['district'] == 'Hambantota') ? 'selected' : ''; ?>>Hambantota</option>
                    <option value="Jaffna" <?php echo ($data['district'] == 'Jaffna') ? 'selected' : ''; ?>>Jaffna</option>
                    <option value="Kalutara" <?php echo ($data['district'] == 'Kalutara') ? 'selected' : ''; ?>>Kalutara</option>
                    <option value="Kandy" <?php echo ($data['district'] == 'Kandy') ? 'selected' : ''; ?>>Kandy</option>
                    <option value="Kegalle" <?php echo ($data['district'] == 'Kegalle') ? 'selected' : ''; ?>>Kegalle</option>
                    <option value="Kilinochchi" <?php echo ($data['district'] == 'Kilinochchi') ? 'selected' : ''; ?>>Kilinochchi</option>
                    <option value="Mannar" <?php echo ($data['district'] == 'Mannar') ? 'selected' : ''; ?>>Mannar</option>
                    <option value="Matale" <?php echo ($data['district'] == 'Matale') ? 'selected' : ''; ?>>Matale</option>
                    <option value="Matara" <?php echo ($data['district'] == 'Matara') ? 'selected' : ''; ?>>Matara</option>
                    <option value="Monaragala" <?php echo ($data['district'] == 'Monaragala') ? 'selected' : ''; ?>>Monaragala</option>
                    <option value="Mullaitivu" <?php echo ($data['district'] == 'Mullaitivu') ? 'selected' : ''; ?>>Mullaitivu</option>
                    <option value="Nuwara Eliya" <?php echo ($data['district'] == 'Nuwara Eliya') ? 'selected' : ''; ?>>Nuwara Eliya</option>
                    <option value="Puttalam" <?php echo ($data['district'] == 'Puttalam') ? 'selected' : ''; ?>>Puttalam</option>
                    <option value="Ratnapura" <?php echo ($data['district'] == 'Ratnapura') ? 'selected' : ''; ?>>Ratnapura</option>
                    <option value="Trincomalee" <?php echo ($data['district'] == 'Trincomalee') ? 'selected' : ''; ?>>Trincomalee</option>
                    <option value="Vavuniya" <?php echo ($data['district'] == 'Vavuniya') ? 'selected' : ''; ?>>Vavuniya</option>
                
                
            </div>
            <div class="form-field file-input">
                <input type="file" name="pet-image" id="image" accept="image/*">
                <label for="image">Choose an image</label>
                <p>Current image: <?php echo $data['pet_image']; ?></p>
            </div>
            <div class="form-field">
                <textarea name="summary" id="summary" rows="3" placeholder="Enter a Summary"
                    required><?php echo $data['summary']; ?></textarea>
            </div>
            <div class="form-field">
                <textarea name="content" id="content" rows="10" placeholder="Enter Post"
                    required>
                    <?php echo $data['content']; ?></textarea>
            </div>
            <div class="form-field">
                <input type="tel" name="contact" id="contact" placeholder="Enter Contact Number" pattern="[0-9]{10}" placeholder=" <?php echo $data['contact']; ?>" required>
                
            </div>
            <input type="hidden" name="current_image" value="<?php echo $data['pet_image']; ?>">
            <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-field">
                <button type="submit" name="update">Update Post</button>
            </div>
            <?php
        }
        ?>
    </form>
</div>
<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '<span class="message">' . $message . '</span>';
    }
}
?>
<link rel="stylesheet" href="../CSS/dashboard.css">
<?php include('footer.php'); ?>