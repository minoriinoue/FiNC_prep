<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>delete_response_redirect.php</title>
</head>
<body>
<?php
	// delete_response_redirect.php
	
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

	// Delete a response.
	$sql = 'delete from responses where response_id = :response_id';
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array(":response_id" => $_GET['response_id']));
	
	// Redirect to response page.
	$link_to_responses = 'LOCATION: responses.php?thread_id=' . 
							$_GET['thread_id'];
	header($link_to_responses);
	
?>
</body>
</html>
