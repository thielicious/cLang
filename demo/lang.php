<?php // lang.php (PRG)

	include "inc.php";

	if (isset($_GET["lang"])) {
		if ($_GET["lang"] == $clang->get("default") || $clang->get("language")) {
	    		$clang->switch($_GET["lang"]);
		}
	}

	if (isset($_GET["reset"])) {
		$_SESSION["reset"] = "Cookie ".($clang->reset() ? 
			"gelöscht" : "existiert nicht"
		).".";
	}

	header("Location: ".$_SERVER["HTTP_REFERER"]);

?>
