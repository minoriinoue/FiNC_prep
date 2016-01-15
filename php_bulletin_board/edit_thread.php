<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Edit thread</title>
</head>
<body>
	<?php 
	// Handle session.
	require_once('session.php');
	session_expire_check();
	?>
	<p><strong>Edit thread<br></strong></p>
	<p>Leave the box blank if you want to use the current thread name/description.</p>
	<form action="edit_thread_redirect.php" method="post">
	<p>Thread name: <input type="text" name="thread_name" maxlength="20" placeholder="max 20 char"></p>
	<p>Thread description: <input type="text" name="thread_description" maxlength="50" placeholder="max 50 char"></p>
	<input type="hidden" name="thread_id" value="<?php echo $_GET['thread_id']; ?>">
	<p><input type="submit" value="Change"></p>
	</form>
</body>
</html>
