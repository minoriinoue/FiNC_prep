<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Deleting...</title>
</head>
<body>
<?php
	// delete_thread.php

	// Handle session.
	require_once('session.php');
	session_expire_check();

	// Access to database.
	try {
		$dbh = new PDO('mysql:host=127.0.0.1;dbname=prep_1_final',
						'root', 'password');
	} catch (PDOException $e) {
		var_dump($e->getMessage());
	}
	
	$sql = 'delete from threads where user_id = :user_id and thread_id = :thread_id';
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array(":user_id" => $_SESSION['user_id'],
						":thread_id" => $_GET['thread_id']));
	
	?>
	<p>Successfully deleted a thread.</p>
	<form action="thread.php" method="get">
	<input type="submit" value="Go back to thread list">
	</form>
</body>
</html>
