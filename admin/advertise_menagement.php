<?php include "delete_ad.php"?>
<!doctype html>
<html lang="en">
  <head>
	

	</head>
	<body>

	<div class="container">
		<div class="title">
			<h2 class="heading">Advertisements Management</h2>
		</div>
		<div class="table_body">
			<table class="table">
				<thead class="thead-dark">
				<tr>
					<th class='id_'>Id</th>
					<th>Post Type</th>
					<th>Message</th>
					<th>Published Date</th>
					<th class="actions">Actions</th>
				</tr>
				</thead>
	<tbody>

		<?php
    include('../connect.php');
    $selectQuery = "SELECT * FROM post";
    $result = mysqli_query($connection, $selectQuery);
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
			<tr class=<?php echo $row['id'] ?>>
					<th class='id_'><?php echo htmlspecialchars($row['id']) ?></th>
					<td><?php echo htmlspecialchars($row['title']); ?></td>
					<td><?php echo htmlspecialchars($row['summary']); ?></td>
					<td><?php echo htmlspecialchars($row['date']); ?></td>
					<td class="actions"> <form action='' method='POST'>
                    <input type='hidden' name='id' value='<?php echo $row['id'] ?>'>
                    <input type='submit' name='submitButton' value='Delete'>
                </form> </td>
				</tr>
            <?php
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }
    ?>
	</tbody>
	</table>
	</div>

</div>

	</body>
</html>

