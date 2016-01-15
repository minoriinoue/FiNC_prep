<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Redirecting...</title>
</head>
<body>
<?php
	// add_response_redirect.php

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

	$sql = 'insert into responses (thread_id, user_id, response, post_date) value (:thread_id, :user_id, :response, now())';
	$stmt_for_adding_response = $dbh->prepare($sql);
	$stmt_for_adding_response->execute(
								array(":thread_id"=> $_POST['thread_id'],
										":user_id"=> $_SESSION['user_id'],
										":response"=> $_POST['response']));
	// Redirect to responses.php?thread_id=?
	$location = 'LOCATION: responses.php?thread_id=' . $_POST['thread_id'];
	header($location);
?>
</body>
