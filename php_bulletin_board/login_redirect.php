<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Redirecting...</title>
</head>
<body>
	<p>
	<?php
	// login_redirect.php

	require_once('session.php');
	// Check if the user_name and password match the registered data in
	// the table 'prep_1_final.users'. If match, redirect to the thread list
	// page with get method. Otherwise, redirect to the login page saying
	// "User name or password is wrong."
	// Also, when login succeeds, start session.

	// Access to database.
	try {
		$dbh = new PDO('mysql:host=127.0.0.1;dbname=prep_1_final',
						'root', 'password');
	} catch (PDOException $e) {
		var_dump($e->getMessage());
	}

	// Check if the user_name and password match.
	$sql = 'select user_id from users where user_name ="' . $_POST['user_name'] . '" and password ="' . $_POST['user_password'] . '"';
	$user_id = $dbh->query($sql)->fetchColumn();
	/*
	if ($stmt->fetch(PDO::FETCH_ASSOC)) {*/
	if ($user_id) {
		// when true, start sesseion and redirect to thread list page.
		first_session($user_id);
		$location = 'LOCATION: thread.php';
		header($location);
	} else {
		// when false, redirect to login page.
		$location = 'LOCATION: login.php?login_fail=true';
		header($location);
	}
	?>
	</p>
</body>
</html>
