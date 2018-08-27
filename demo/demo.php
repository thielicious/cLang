<?php include "inc.php"; ?>
<!DOCTYPE html>
<html lang=<?= $_COOKIE[$clang->get("name")] ?? "de" ?>>
	<head>
		<title>cLang Demo v1.0</title>
		<meta charset=utf-8>
	</head>
	<style>
		li,ul{display:inline-block}
		#lang{float:right}
		.active-lang{background:lightgreen}
	</style>
	<body>
		<main>
			<header>
				<h1>cLang Demo v1.0</h1><hr>
				<nav>
					<ul id=menu>
						<li><a href=demo.php><?= $clang->check("NEUIGKEITEN","NEWS") ?></a></li>
						<li><a href=?about><?= $clang->check("ÜBER UNS", "ABOUT US") ?></a></li> | 
						<li><a href=?contact><?= $clang->check("KONTAKT", "CONTACT") ?></a></li>
					</ul>
					<ul id=lang>
						<li><a id=de <?= $clang->active("de", "class=active-lang", true) ?> href=lang.php?lang=de title=Deutsch>DE</a></li>
						<li><a id=en <?= $clang->active("en", "class=active-lang") ?> href=lang.php?lang=en title=English>EN</a></li>
					</ul>
				</nav>
			</header>
			<section>
				<?php
					if (!count($_GET)) {
						echo "<h2>".$clang->check("Willkommen","Welcome")."!</h2>
							<p>".$clang->check("Ein paar Neuigkeiten","Some news here").".</p>";
					} elseif (isset($_GET["about"])) {
						echo "<h2>".$clang->check("Über Uns","About Us")."</h2>
							<p>".$clang->check("Etwas Text über uns","Some text about us").".</p>";
					} elseif (isset($_GET["contact"])) {
						echo "<h2>".$clang->check("Kontakt","Contact")."</h2>
							<p>".$clang->check("Kontaktinformationen hier","Contact information here").".</p>";
					}
				?>
				<button onClick=javascript:location='lang.php?reset'><?= $clang->check("Cookie löschen", "Delete Cookie") ?></button><br>
				<?= @$_SESSION["reset"]; $_SESSION = []; ?>
			</section>
			<br>&nbsp;<br>
		</main>
		<footer>
			<address>
				<small>cLang Demo &copy; 2018 Thielicious</small>
			</address>
		</footer>		
	</body>
</html>
