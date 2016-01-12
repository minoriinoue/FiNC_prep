<?php

try {
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=rdb_training_1',
					'root', 'aw4m8m2g35');
} catch (PDOException $e) {
	var_dump($e->getMessage());
}

echo "success";

$stmt = $dbh->prepare("insert into engineers (name, age) value (:name, :age)");
$stmt->bindParam(":name", $name);
$stmt->bindParam(":age", $age);

$name = "南野";
$age = 26;

$stmt->execute();

$name = "清水";
$age = 30;

$stmt->execute();

$dbh = null;
?>
