<?php
// Check if there is correct command line.
if ($argc != 2) {
	exit("Incorrect number of arguments. Please specify the number of rows.");
}


for ($i = 1; $i <= intval($argv[1]); $i++) {
	for ($l = 1; $l <= $i; $l++) {
		echo "*";
	}
	echo "\n";
}
