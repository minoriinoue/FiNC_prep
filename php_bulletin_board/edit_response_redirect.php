<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Editting...</title>
</head>
<body>
<?php
	// edit_response_redirect.php

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

	// Edit response.
	$sql = 'update responses set response = :response where response_id = '
			. ':response_id';
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array(":response" => $_POST['response'],
						":response_id" => $_POST['response_id']));
	echo 'Edit Success';
	?>
	<form action="responses.php" method="get">
	<input type="hidden" name="thread_id" value="<?php echo $_POST['thread_id'];?>">
	<input type="submit" value="Go back to responses">
	</form>
</body>
</html>
