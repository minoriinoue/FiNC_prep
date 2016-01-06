<?php
	function average($array) {
		$sum = 0;
		for ($i = 0; $i < count($array); $i++) {
			$sum += $array[$i];
		}
		return $sum / count($array);
	}
?>
