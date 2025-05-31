<?php include('header.php'); ?>

<main class="dashboard-container" role="main" aria-labelledby="create-post-heading">

    <h1 id="create-post-heading">Create New Post</h1>

    <form id="postForm" action="process.php" method="post" enctype="multipart/form-data" aria-describedby="form-desc">
        <p id="form-desc" class="sr-only">Use this form to create a new post for pet adoption or rehoming.</p>

        <div class="form-field">
            <label for="title">Post Type <span aria-hidden="true">*</span></label>
            <select name="title" id="title" required aria-required="true">
                <option value="">Select Post Type</option>
                <option value="Adopt">Adopt</option>
                <option value="Rehome">Rehome</option>
            </select>
        </div>

        <div class="form-field">
            <label for="district">District <span aria-hidden="true">*</span></label>
            <select name="district" id="district" required aria-required="true">
                <option value="">Select District</option>
                <?php
                $districts = ["Ampara", "Anuradhapura", "Badulla", "Batticaloa", "Colombo", "Galle", "Gampaha", "Hambantota",
                              "Jaffna", "Kalutara", "Kandy", "Kegalle", "Kilinochchi", "Mannar", "Matale", "Matara",
                              "Monaragala", "Mullaitivu", "Nuwara Eliya", "Puttalam", "Ratnapura", "Trincomalee", "Vavuniya"];
                foreach ($districts as $d) {
                    echo "<option value=\"$d\">$d</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-field file-input">
            <label for="image">Choose an image</label>
            <input type="file" name="pet-image" id="image" accept="image/*" aria-describedby="image-desc">
            <p id="image-desc" class="sr-only">Upload an image of the pet (optional).</p>
        </div>

        <div class="form-field">
            <label for="summary">Summary <span aria-hidden="true">*</span></label>
            <textarea name="summary" id="summary" rows="3" placeholder="Enter a Summary" required aria-required="true"></textarea>
        </div>

        <div class="form-field">
            <label for="content">Post Content <span aria-hidden="true">*</span></label>
            <textarea name="content" id="content" rows="10" placeholder="Enter Post" required aria-required="true"></textarea>
        </div>

        <div class="form-field">
            <label for="contact">Contact Number <span aria-hidden="true">*</span></label>
            <input type="tel" name="contact" id="contact" placeholder="Enter Contact Number"
                   pattern="[0-9]{10}" required aria-required="true"
                   aria-describedby="contact-help">
            <small id="contact-help">Enter a 10-digit phone number.</small>
        </div>

        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">

        <div class="form-field">
            <button type="submit" name="create" aria-label="Submit the post">Create Post</button>
        </div>
    </form>

    <?php
    if (isset($message)) {
        foreach ($message as $m) {
            echo '<span class="message" role="alert">' . htmlspecialchars($m) . '</span>';
        }
    }
    ?>

</main>

<link rel="stylesheet" href="../CSS/dashboard.css">
<?php include('footer.php'); ?>
