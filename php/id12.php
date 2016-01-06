<?php
	// This function takes an array of numbers as an argument and
	// put the numbers into another array till the sum of numbers
	// goes up to 15.
	function check_sum($array) {
		$sum = 0;
		$new_array = array();
		foreach ($array as $value) {
			$sum += $value;
			$new_array[] = $value;
			if ($sum > 15) break;
		}
		return $new_array;
	}
?>
		
