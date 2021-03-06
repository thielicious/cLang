# cLang
##### Small API for managing multilingual websites.
---

<br>

## INTRODUCTION

**cLang** ('c' abbr. for 'change') is a small API which you can use for cheap multilingual websites. It's using cookies and optimal for OnePages. No additional frameworks necessary, PHP 7.0.0+ required.

<br>

## SETUP INFORMATION

Use your CLI and enter the following to clone:<br>
`git clone https://github.com/thielicious/cLang.git`

<br>

## USAGE (Example)

(inc.php) Create an object:<br>
Parameters: cookie name, default language and alternative language<br>
```
require "cLang.class.php";
$clang = new cLang("language-cookie", "de", "en");
```

(index.php) Create a menu for subsites in both languages:
```
<?php include "inc.php"; ?>
<ul id=menu>
	<li><a href=index.php><?= $clang->check("NEUIGKEITEN","NEWS") ?></a></li> | 
	<li><a href=?contact><?= $clang->check("KONTAKT", "CONTACT") ?></a></li>
</ul>
```

(index.php) Create a small simple UX to make visitors able to click and change language of the website:
```
<ul id=language>
	<li><a <?= $clang->active("de", "class=active-lang", true) ?> href=lang.php?lang=de>DE</a></li>
	<li><a <?= $clang->active("en", "class=active-lang") ?> href=lang.php?lang=en>EN</a></li>
</lu>
```

(index.php) Write some text in both languages inside of the content on every page:
```
<section id=content>
	<?php
		if (!count($_GET)) {
			echo "<h2>".$clang->check("Willkommen!","Welcome")."</h2>";
		} elseif (isset($_GET["contact"])) {
			echo "<h2>".$clang->check("Kontakt","Contact")."</h2>";
		}
	?>
</section>
```

(lang.php) Now use the following PRG pattern to handle a `$_GET` request when someone chooses a language:
```
include "inc.php";
if (isset($_GET["lang"])) {
	if ($_GET["lang"] == $clang->get("default") || $clang->get("language")) {
    		$clang->switch($_GET["lang"]);
	}
}
header("Location: ".$_SERVER["HTTP_REFERER"]);
```

<br>

## METHODS

**cLang::__construct(string $name, string $default, string $lang)**
* Choose a cookie name, a default language and another one that is supposed to be selected.<br>
<br>

**cLang::switch(string $lang)**
* This will switch to the selected language by re/placing its cookie.<br>
<br>

**cLang::reset()**
* Remove the cookie and the default language will be used upon page refresh.<br>
<br>

**cLang::get(string $param)**
* Return cookie name or language by using one of the following strings<br>
`"name"`, `"default"`, `"language"`<br>
<br>

**cLang::check(string $default, string $lang)**
* Return the content in the language that's currently set, otherwise it will pick default.<br>
<br>

**cLang::active(string $lang, string $style, $default = null)**
* Apply a CSS style to the active UX.<br>
Example:  `$clang->active("de", "class=active-lang", true)`<br>
Use `true` as 3rd parameter if you would like to set the language as default.
<br>
<br>

:new: A **[Demo](https://github.com/thielicious/cLang/tree/master/demo)** has been added.

<br>
<br>

###### If you encounter any bugs, feel free to open up an **[issue](https://github.com/thielicious/cLang/issues)**, thank you.

---
**[thielicious.github.io](http://thielicious.github.io)**
