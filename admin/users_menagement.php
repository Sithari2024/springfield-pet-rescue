<?php include "delete_user.php"?>
<?php include "accept_user.php"?>
<?php include "set_admin.php"?>

<!doctype html>
<html lang="en">
  <head>
	
	<link rel="stylesheet" href="dashboard.css">

	</head>
	<body>

	<div class="container">
		<div class="title">
			<h2 class="heading">Users Management</h2>
		</div>
		<div class="table_body">
			<table class="table">
				<thead class="thead-dark">
				<tr>
					<th class='id_'>Id</th>
					<th class="name">First Name</th>
					<th class="name">Last Name</th>
					<th>User Name</th>
					<th>Email</th>
					<th class="actions">Accept</th>
					<th class="actions">Admin</th>
					<th class="actions">Remove</th>
				</tr>
				</thead>
	<tbody>

		<?php
    include('../connect.php');
    $selectQuery = "SELECT * FROM users";
    $result = mysqli_query($connection, $selectQuery);
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
			<tr class=<?php echo $row['id'] ?>>
					<th class='id_'><?php echo htmlspecialchars($row['id']) ?></th>
					<td class="name"><?php echo htmlspecialchars($row['firstName']); ?></td>
					<td class="name"><?php echo htmlspecialchars($row['lastName']); ?></td>
					<td><?php echo htmlspecialchars($row['username']); ?></td>
					<td><?php echo htmlspecialchars($row['email']); ?></td>
					<td class="actions"><form action='' method='POST'>
                    <input type='hidden' name='id' value='<?php echo $row['id'] ?>'>
                    <input type='submit' name='submitButton1' value=<?php if($row['accepted']==false){echo 'Accept';} else {echo "Reject";}?>>
                		</form></td>
						<td class="actions"><form action='' method='POST'>
                    <input type='hidden' name='id' value='<?php echo $row['id'] ?>'>
                    <input type='submit' name='submitButton2' value=<?php if($row['admin']==false){echo 'Accept';} else {echo "Reject";}?>>
                		</form></td>
					<td class="actions"> <form action='' method='POST'>
                    <input type='hidden' name='id' value='<?php echo $row['id'] ?>'>
                    <input type='submit' name='submitButton3' value='Delete'>
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

