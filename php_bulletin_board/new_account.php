<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Create New Account</title>
</head>
<body>
	<?php
		// new_account.php

		// Have users input user name and password. After the user presses
		// the submit button, redirects to registering page where
		// registering to database occurs.

		if (array_key_exists("already_registered", $_GET)) {
			echo "Already registered user name. Please select other user name.<br>";
		}
	?>
	<p>Create New Account</p>
	<form action="new_account_redirect.php" method="post">
		<p>User Name: <input type="text" name="user_name" maxlength="20" placeholder="max 20 char" required></p>
		<p>Password: <input type="password" name="user_password" maxlength="20" placeholder="max 20 char" required></p>
		<p><input type="submit" value="Register!"></p>
	</form>

	<form action="login.php" method="get">
		<p><input type="submit" value="Go back to login"></p>
	</form>
</body>
</html>
