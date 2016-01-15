<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login Form</title>
</head>
<body>
<?php
	// login.php

	require_once('session.php');

	// If the session is valid, directly redirect to threads.php
	if (session_expire_check()) {
		header('LOCATION: thread.php');
	}

	// When session expires, session_expire_check() will direct
	// the user to login.php with $_GET['session_expire'] = true.
	if (array_key_exists('session_expire', $_GET)) {
		echo 'Session expired. Please log in again.<br>';
	}

	// When user_name or password is wrong.
	if (array_key_exists('login_fail', $_GET)) {
		echo 'User name or password is wrong.<br>';
	}

	// When a new account is successfully created.
	if (array_key_exists('register_success', $_GET)) {
		echo 'New account successfully created. Please log in.<br>';
	}
?>
</p>
	<form action="login_redirect.php" method="post">
	<p>User Name: <input type="text" name="user_name" maxlength="20" placeholder="max 20 char"></p>
	<p>Password: <input type="password" name="user_password" maxlength="20"></p>
	<p><input type="submit" value="Log in!"></p>
	</form>
	<form action="new_account.php" method="get">
	<p><input type="submit" value="Create new account"></p>
	</form>
</body>
</html>
