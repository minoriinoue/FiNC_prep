<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Editting</title>
</head>
<body>
<?php
	// edit_thread_redirect.php

	// Handle session
	require_once('session.php');
	session_expire_check();

	// Access to database.
	try {
		$dbh = new PDO('mysql:host=127.0.0.1;dbname=prep_1_final',
						'root', 'password');
	} catch (PDOException $e) {
		var_dump($e->getMessage());
	}

	// If the box is not blank, update the data in table threads.
	if (!empty($_POST['thread_name'])) {
		$sql = 'update threads set thread_name = :thread_name where thread_id = :thread_id';
		$stmt = $dbh->prepare($sql);
		$stmt->execute(array(":thread_name" => $_POST['thread_name'],
							":thread_id" => $_POST['thread_id']));
	}

	if (!empty($_POST['thread_description'])) {
		$sql = 'update threads set thread_description = :thread_description ' .
				'where thread_id = :thread_id';
		$stmt = $dbh->prepare($sql);
		$stmt->execute(array(":thread_description" => $_POST['thread_description'],
							":thread_id" => $_POST['thread_id']));
	}

	echo 'Edit succeeded.<br>';
?>
	<form action="thread.php" method="get">
		<p><input type="submit" value="Go back to thread list"></p>
	</form>
</body>
</html>
