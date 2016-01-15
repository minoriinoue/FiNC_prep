<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Redirecting...</title>
</head>
<body>
	<?php
		// new_account_redirect.php

		// Access to database
		try {
			$dbh = new PDO('mysql:host=127.0.0.1;dbname=prep_1_final',
							'root', 'password');
		} catch (PDOException $e) {
			var_dump($e->getMessage());
		}

		// Check if the inputed the user_name already exists.
		$sql = 'select * from users where user_name = :user_name';
		$stmt = $dbh->prepare($sql);
		$stmt->execute(array(":user_name" => $_POST['user_name']));
	
		// If the user_name already exists, return back to new_account.php
		if ($stmt->fetch(PDO::FETCH_ASSOC)) {
			header("LOCATION: new_account.php?already_registered=true");
		}

		// Register the user name and password.
		$stmt = $dbh->prepare("insert into users (user_name, password) value (:name, :password)");
		$stmt->execute(array(":name" => "$_POST[user_name]", 
						":password" => "$_POST[user_password]"));

		// Redirect to login page.
		header("LOCATION: login.php?register_success=true");
	?>
</body>
</html>
