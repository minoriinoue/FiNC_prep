<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Edit response</title>
</head>
<body>
<?php
// edit_response.php

// Handle session.
require_once('session.php');
session_expire_check();
?>
<form action="edit_response_redirect.php" method="post">
<p>Edit Response</p>
<p><textarea name="response" rows="3" cols="40" maxlength="200" placeholder="Write an edit version here. max 200 chars"></textarea></p>
<input type="hidden" name="response_id" value="<?php echo $_GET['response_id'];?>">
<input type="hidden" name="thread_id" value="<?php echo $_GET['thread_id']; ?>">
<input type="submit" value="Edit response">
</form>

<form action="responses.php" method="get">
<input type="hidden" name="thread_id" value="<?php echo $_GET['thread_id']; ?>">
<input type="submit" value="Go back to responses">
</form>
</body>
</html>
