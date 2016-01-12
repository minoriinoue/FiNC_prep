<?php

try {
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=rdb_training_1',
					'root', 'aw4m8m2g35');
} catch (PDOException $e) {
	var_dump($e->getMessage());
}

echo "success";

$sql = "insert into engineers (name, age) value (:name, :age)";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(":name" => "minori", ":age" => 24));

foreach ($dbh->query("select name from engineers") as $name) {
	echo($name[name]);
}

$dbh->query("update engineers set age = age+1 where name = \"minori\"");

$dbh->query("delete from engineers where name = \"minori\"");

$dbh = null;
?>
