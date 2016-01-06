<?php
	// id 13
	$hash = array("key1" => 1, "key2" => 2, "key3" => 3);

	echo "--id 14--\n";
	echo $hash["key2"], "\n";

	// id 15
	$hash["key4"] = 4;

	// id 16
	echo "--id 16--\n";
	foreach ($hash as $key => $value) {
		echo $key, " is ", $value, "\n";
	}
?>
