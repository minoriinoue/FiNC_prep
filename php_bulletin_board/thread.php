<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Thread List</title>
</head>
<body>
<?php
// thread.php

require_once('session.php');
session_expire_check();

// Access to database to fetch thread data
try {
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=prep_1_final',
					'root', 'password');
} catch (PDOException $e) {
	var_dump($e->getMessage());
}
?>

<p>
<?php
$sql = 'select user_name from users where user_id = ' . $_SESSION['user_id'];
$login_user = $dbh->query($sql)->fetchColumn();

// Welcome message to user.
echo 'Welcome ' . $login_user . '!';
?>

<form action='logout.php' method=post>
<input type="submit" value="logout">
</form>
To log in as another user, please log out first.
</p>

<!--Create New Thread-->
<p><strong>Create New Thread</strong></p>
<form action="create_thread_redirect.php" method="post">
<p>Thread Name<br><input type="text" name="thread_name" maxlength="20" placeholder="max 20 chars"></p>
<p>Thread Description<br><textarea name="thread_description" rows="2" cols="40" maxlength="50" placeholder="max 50 chars"></textarea></p>
<input type="submit" value="Create">
</form>

<p><strong>Thread List<br></strong></p>
<?php
// The list of threads. If there is none, show "no thread uploaded".
$stmt =  $dbh->query('select * from threads order by post_date desc');
$column_number = $dbh->query('select count(*) from threads')->fetchColumn();

if ($column_number == 0) {?>
	<p><?php echo 'No thread uploaded for now.<br>';?></p>
<?php
} else {?>
	<table>
		<thead>
			<tr>
				<th>Thread Name</th><th>User Name</th><th>Start Date</th><th></th><th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			for ($i = 0; $i < $column_number; $i++) {
				$thread_row = $stmt->fetch();

				// Get the owner name of the thread.
				$thread_owner_id = $thread_row['user_id'];
				$sql = 'select users.user_name from users, threads where users.user_id' .
						' = threads.user_id and threads.user_id = ' . $thread_owner_id;
				$owner_name = $dbh->query($sql)->fetchColumn();
				?>
				<tr>
				<td><?php echo $thread_row['thread_name']; ?></td>
				<td><?php echo $owner_name; ?></td>
				<td><?php echo $thread_row['post_date']; ?></td>
				<?php
					$link_to_responses = '"responses.php?thread_id=' .
										$thread_row['thread_id'] . '"';
				?>   
				<td><a href=<?php echo $link_to_responses; ?>>Responses</a></td>
				<?php
				if ($owner_name == $login_user) {
					// Show edit and delete thread button only to its owner.
					$link_to_edit = '"edit_thread.php?thread_id=' . 
									$thread_row['thread_id'] . '"';
					$link_to_delete = '"delete_thread.php?thread_id=' .
									$thread_row['thread_id'] . '"';
					?><td><a href=<?php echo $link_to_edit;?>>Edit</a></td>
					<td><a href=<?php echo $link_to_delete; ?>>Delete</a></td>
				<?php
				}?>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
<?php
}?>
</body>
</html>
