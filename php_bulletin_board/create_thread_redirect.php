<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Redirecting...</title>
</head>
<body>
	<?php
		// create_thread_redirect.php

		require_once('session.php');
		session_start();
		// Access to database
		try {
			$dbh = new PDO('mysql:host=127.0.0.1;dbname=prep_1_final',
							'root', 'password');
		} catch (PDOException $e) {
			var_dump($e->getMessage());
		}

		// Check if there is already the same data (user_id &thread_name & description).
		$sql = 'select thread_id from threads where user_id = :user_id and thread_name' .
				' = :thread_name and thread_description = :thread_description';
		$stmt = $dbh->prepare($sql);
		$result = $stmt->execute(array(':user_id' => $_SESSION['user_id'],
									':thread_name' => $_POST['thread_name'],
									':thread_description' => $_POST['thread_description']));
		
		if ($stmt->fetch() != false) {
			// The data exists in db.
			?><p>Same (user_name, thread_name, thread_description combination)
				already exists.<br></p>
			<form action="thread.php" method="get">
			<input type="submit" value="Go back to thread list">
			</form>
			<?php
		} else {
			$sql = 'insert into threads (thread_name, thread_description, user_id, post_date)
					value (:thread_name, :thread_description, :user_id, now())';
			$stmt = $dbh->prepare($sql);
			$stmt->execute(array(":thread_name" => $_POST['thread_name'],
								":thread_description" => $_POST['thread_description'],
								":user_id" => $_SESSION['user_id']));
			// Redirect to thread.php
			header('LOCATION:thread.php');
		}
		?>
</body>
</html>
