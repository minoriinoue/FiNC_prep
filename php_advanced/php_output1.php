<!DOCTYPE html>
<html>

<body>
<?php
try {
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=rdb_training_1',
					'root', 'password');
} catch (PDOException $e) {
	var_dump($e->getMessage());
}

$stmt =  $dbh->query("select * from engineers where name = \"南野\"");
while($info = $stmt->fetch()) {
?>
	<h2><?php echo $info["age"]; ?></h2>
<?php
}

$dbh = null;
?>
</body>
</html>
