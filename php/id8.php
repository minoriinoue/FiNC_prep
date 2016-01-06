<?php
	$array = array();
	while (true) {
		echo "Please add a number. When quit, press 0.";
		fscanf(STDIN, "%d\n", $input);

		if ($input == 0) break;
		
		if (!in_array($input, $array, true)) {
			$array[] = $input;
		}
	}
	var_dump($array);
?>
