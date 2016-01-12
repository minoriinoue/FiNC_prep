<?php

try {
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=rdb_training_1',
					'root', 'aw4m8m2g35');
} catch (PDOException $e) {
	var_dump($e->getMessage());
}

echo "success";

$stmt =  $dbh->query("select * from engineers where name = \"南野\"");
while($info = $stmt->fetch()) {
	echo($info["name"]);
	echo($info["age"]);
}

$dbh = null;
?>
