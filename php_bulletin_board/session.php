<?php

// session.php

function first_session($user_id) {
	session_start();
	$_SESSION['user_id'] = $user_id;
	return;
}

function session_expire_check() {
	session_start();
	if (count($_SESSION) == 0) {
	// When the session expires, redirect to login page.
		$link_to_login = 'login.php?session_expire=true';
		header($link_to_login);
		return false;
	}
	return true;
}

?>
