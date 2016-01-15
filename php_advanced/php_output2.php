<!DOCTYPE html>
<html>
<meta charset="utf-8">
<body>
<?php

try {
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=rdb_training_1',
					'root', 'password');
} catch (PDOException $e) {
	var_dump($e->getMessage());
}

$stmt =  $dbh->query("select * from engineers");
$column_number = $dbh->query("select count(*) from engineers")->fetchColumn();

for ($i = 0; $i < $column_number; $i++) {
	$info = $stmt->fetch();
?>
	<h2>
		<?php
			echo $info["name"], ":";
			echo $info["age"], "歳", "<br>";
			if ($i != $column_number - 1) {
				echo "---<br>";
			}
		?>
	</h2>
<?php
}

$dbh = null;
?>
</body>
</html>
