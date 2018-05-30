<?php // inc.php
	
	session_start();
	require "cLang.class.php";
	$clang = new cLang("cLang-cookie", "de", "en");

?>