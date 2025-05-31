<?php
include '../connect.php'; 
include '../admin/header.php'; ?>


<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<div class="container">
    <div class="title">
        <h2 class="heading">Messages</h2>
    </div>

    <div class="table_body">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Content</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selectQuery = "SELECT * FROM message";
                $result = mysqli_query($connection, $selectQuery);
                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['username'] ?? ''); ?></td>
							<td><?php echo htmlspecialchars($row['email'] ?? ''); ?></td>
							<td><?php echo htmlspecialchars($row['subject'] ?? ''); ?></td>
							<td><?php echo htmlspecialchars($row['content'] ?? ''); ?></td>

                            <td>
                                <form action='delete_message.php' method='POST'>
                                    <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                    <input type='submit' name='submitButton' value='Delete'>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>Error loading messages: " . mysqli_error($connection) . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
