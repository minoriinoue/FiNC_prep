<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Logging out</title>
</head>
<body>
<?php
require_once('session.php');
session_expire_check();

// Log out and redirect to login.php
session_unset();
header('LOCATION: login.php');
?>
</body>
</html>
