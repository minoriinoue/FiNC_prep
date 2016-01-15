<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Responses</title>
</head>
<body>
<?php
	// responses.php

	// Handle session
	require_once('session.php');
	session_expire_check();

	// Access to database
	try {
		$dbh = new PDO('mysql:host=127.0.0.1;dbname=prep_1_final',
						'root', 'password');
	} catch (PDOException $e) {
		var_dump($e->getMessage());
	}

	// Fetch thread name
	$sql = 'select thread_name from threads where thread_id = :thread_id';
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array(":thread_id" => $_GET['thread_id']));
	$thread_name = $stmt->fetchColumn();
?>

<p><strong>Responses to <?php echo $thread_name; ?></strong></p>
<form action="add_response_redirect.php" method="post">
<textarea name="response" rows="3" cols="40" maxlength="200" placeholder="Add response here. max 200 chars"></textarea>
<input type="hidden" name="thread_id" value="<?php echo $_GET['thread_id']; ?>">
<input type="submit" value="Add response">
</form>

<?php
	$sql = 'select * from responses where thread_id = :thread_id order by post_date desc';
	$stmt_for_responses = $dbh->prepare($sql);
	$stmt_for_responses->execute(array(":thread_id" => $_GET['thread_id']));

	$stmt_for_column_number = $dbh->prepare('select count(*) from responses where thread_id = :thread_id');
	$stmt_for_column_number->execute(array(":thread_id" => $_GET['thread_id']));
	$column_number = $stmt_for_column_number->fetchColumn();
	if ($column_number == 0 ) {
		?><p>No responses for now.<br></p>
<?php
	} else {
		$sql = 'select user_name from users where user_id = :user_id';
		$stmt_for_user_name = $dbh->prepare($sql);
		$stmt_for_user_name->bindParam(":user_id", $user_id);

		?>
		<table>
			<thead>
				<tr>
					<th>User Name</th><th>Response</th><th>Post_Date</th><th></th><th></th>
				</tr>
			</thead>
			<tbody>
		<?php
		for ($i = 0; $i < $column_number; $i++) {
			$response_row = $stmt_for_responses->fetch();
			$user_id = $response_row['user_id'];
			$stmt_for_user_name->execute();
			$user_name = $stmt_for_user_name->fetchColumn();
			?>
			<tr>
			<td><?php echo $user_name; ?></td>
			<td><?php echo $response_row['response']; ?></td>
			<td><?php echo $response_row['post_date']; ?></td>
			<?php
			// Edit and Delete button for the login user.
			if ($user_id == $_SESSION['user_id']) {
				$response_id = $response_row['response_id'];
				$link_to_edit = '"edit_response.php?response_id=' .
								$response_id . 
								'&thread_id=' .
								$_GET['thread_id'] . '"';
				$link_to_delete = '"delete_response.php?thread_id=' .
								$_GET['thread_id'] .
								'&response_id=' .
								$response_id . '"';
				?>
				<td><a href=<?php echo $link_to_edit; ?>>Edit</a></td>
				<td><a href=<?php echo $link_to_delete; ?>>Delete</a></td>
				<?php
			}?>
			</tr>
		<?php
		}?>
			</tbody>
		</table>
	<?php
	}?>
	<form action="thread.php" method="get">
	<input type="submit" value="Go back to thread list">
	</form>
</body>
</html>
