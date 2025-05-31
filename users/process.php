<?php
include('../connect.php');
session_start();

if (isset($_POST['create'])) {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $pet_image = $_FILES['pet-image']['name'];
    $pet_image_tmp_name = $_FILES['pet-image']['tmp_name'];
    $pet_image_folder = '../uploaded_images/' . $pet_image;
    $summary = mysqli_real_escape_string($connection, $_POST['summary']);
    $content = mysqli_real_escape_string($connection, $_POST['content']);
    $district = mysqli_real_escape_string($connection, $_POST['district']);
    $date = $_POST['date'];
    $user_id = $_SESSION['user_id'];
    $contact = mysqli_real_escape_string($connection, $_POST['contact']);

    if (empty($title) || empty($summary) || empty($content) || empty($date) || empty($district) || empty($contact)) {
        $message[] = 'All fields are required';
    } else {

        $insertQuery = "INSERT INTO post(title,pet_image,summary,content,date,user_id,district,contact)
                       VALUES ('$title','$pet_image','$summary','$content','$date', '$user_id', '$district', '$contact')";
        $upload = mysqli_query($connection, $insertQuery);

        if ($upload) {
            move_uploaded_file($pet_image_tmp_name, $pet_image_folder);
            $message[] = 'New post has been uploaded successfully';
            header('location: index.php');

            exit();
        } else {
            $message[] = 'Could not upload the post';
        }
    }
}

?>

<?php
include('../connect.php');

if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $summary = mysqli_real_escape_string($connection, $_POST['summary']);
    $content = mysqli_real_escape_string($connection, $_POST['content']);
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $date = $_POST['date'];
    $current_image = $_POST['current_image'];
    $district = mysqli_real_escape_string($connection, $_POST['district']);
    $contact = mysqli_real_escape_string($connection, $_POST['contact']);
    // Check if a new image was uploaded
    if (!empty($_FILES['pet-image']['name'])) {
        $pet_image = $_FILES['pet-image']['name'];
        $pet_image_tmp_name = $_FILES['pet-image']['tmp_name'];
        $pet_image_folder = '../uploaded_images/' . $pet_image;
    } else {
        $pet_image = $current_image;
    }

    if (empty($title) || empty($summary) || empty($content) || empty($date)|| empty($district) || empty($contact)) {
        $message[] = 'All fields are required';
    } else {
        $updateQuery = "UPDATE post SET title='$title', pet_image='$pet_image', summary='$summary', content='$content', date='$date', district='$district', contact='$contact' WHERE id='$id'";
        $upload = mysqli_query($connection, $updateQuery);

        if ($upload) {
            if (!empty($_FILES['pet-image']['name'])) {
                move_uploaded_file($pet_image_tmp_name, $pet_image_folder);
                
            }
            $message[] = 'Post has been updated successfully';
            header('location: ../users/index.php');
            exit();
        } else {
            $message[] = 'Could not update the post';
        }
    }
}

?>