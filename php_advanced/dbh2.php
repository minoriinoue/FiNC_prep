<?php
try {
	throw new Exception('error message');
} catch (Exception $e) {
	var_dump($e->getMessage());
	die('スクリプトを終了します');
}
