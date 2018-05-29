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

(inc.php) Create an object:
```
require "cLang.class.php";
$clang = new cLang("language", "de", "en");
```

(index.php) Declare a closure in PHP to check the **active** language. It will be highlighted using a CSS class (only an example):
```
$active = function($lang) use ($clang) {
	if ($clang->active() == $lang) {
		return "class=active-lang";
	}
};
```

(index.php) Declare a closure that defines the **default** language upon visiting the website for first time:
```
$default = function() use ($clang) {
	if (!$clang->active()) {
		return "class=active-lang";
	}
};
```

(index.php) Create a small simple UX to make visitors able to click and change language of the website:
```
<ul id=language>
	<li><a id=de <?= $active("de").$default() ?> href=lang.php?lang=de title=Deutsch>DE</a></li>
	<li><a id=en <?= $active("en") ?> href=lang.php?lang=en title=English>EN</a></li>
</lu>
```

(index.php) Create a menu for subsites:
```
<ul id=menu>
	<li><a href=index.php><?= $clang->check("NEUIGKEITEN","NEWS") ?></a></li> | 
	<li><a href=?about><?= $clang->check("ÜBER UNS", "ABOUT US") ?></a></li> | 
	<li><a href=?contact><?= $clang->check("KONTAKT", "CONTACT") ?></a></li>
</ul>
```

(index.php) Inside of the content on every page write some text in **both** languages by using the method `::check()`:
```
<section>
	<?php
		if (!count($_GET)) {
			echo "<h2>".$clang->check("Willkommen!","Welcome")."</h2>";
		} elseif (isset($_GET["about"])) {
			echo "<h2>".$clang->check("Über Uns","About Us")."</h2>";
		} elseif (isset($_GET["contact"])) {
			echo "<h2>".$clang->check("Kontakt","Contact")."</h2>";
		}
	?>
</section>
```

(lang.php) Now use the following PRG pattern to handle a `$_GET` request:
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

## METHODS (Still under construction)

**cLang::__construct(string $name, string $default, string $lang)**
* Choose a cookie name, a default language and another one that is supposed to be selected.<br>
<br>

**cLang::error()**
* Lorem ipsum dolor sit amet.<br>
<br>

**cLang::switch()**
* Lorem ipsum dolor sit amet.<br>
<br>

**cLang::reset()**
* Lorem ipsum dolor sit amet.<br>
<br>

**cLang::get()**
* Lorem ipsum dolor sit amet.<br>
<br>

**cLang::cookie()**
* Lorem ipsum dolor sit amet.<br>
<br>

**cLang::check()**
* Lorem ipsum dolor sit amet.<br>
<br>

**cLang::active()**
* Lorem ipsum dolor sit amet.<br>
<br>

<br>
<br>
A demo is subjected to be added in near future.

###### If you encounter any bugs, feel free to open up an **[issue](https://github.com/thielicious/cLang/issues)**, thank you.

---
**[thielicious.github.io](http://thielicious.github.io)**
