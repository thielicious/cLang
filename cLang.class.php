<?php // cLang v1.0 | (c) Thielicious | thielicious.github.io

    class cLang {

    	private
    		$defLang,
    		$lang,
    		$name;

        // assign cookie name, default language and choosen language
    	public function __construct(string $name, string $default, string $lang) {
    		$this->name = $name;
    		$this->defLang = $default;
    		$this->lang = $lang;
    	}

        // custom error message
        private static function error(string $msg) {
            trigger_error("Class cLang: ".$msg, E_USER_ERROR);
            exit;
        }

        // replace cookie for the choosen language
        public function switch(string $lang) {
            setcookie($this->name, "", 1);
            setcookie($this->name, $lang, time()+1209600);
        }

        // remove cookie
    	public function reset() {
    		if (isset($this->name)) {
                if (isset($_COOKIE[$this->name])) {
    	    		setcookie($this->name, "", 1);
                     return true;
                } else {
                    return false;
                }
	    	} else {
	    		static::error("Cookie name not set.");
	    	}
    	}

        // return cookie name and language
        public function get(string $what) {
            switch ($what) {
                case "name" : return $this->name; break;
                case "default" : return $this->defLang; break;
                case "language" : return $this->lang; break;
                default: break;
            }
        }

        // look up if a specified value exists
    	private function cookie($value) {
    		if (isset($this->name)) {
		    	if (isset($_COOKIE[$this->name])) {
		    		if ($_COOKIE[$this->name] == $value) {
		    			return true;
		    		} else {
		    			return false;
		    		}
		    	} else {
		    		return false;
		    	}
		    } else {
	    		static::error("Cookie name not set.");
	    	}
	    }

        // check which language is currently set in the cookie
    	public function check(string $default, string $lang) {
    		if (isset($this->name)) {
	    		return $this->cookie($this->lang) ? $lang : $default;
	    	} else {
	    		static::error("Cookie name and default language not set.");
	    	}
    	}

        // return cookie if it exists otherwise false (for active stylesheets)
        public function active() {
            if (isset($_COOKIE[$this->name])) {
                return $_COOKIE[$this->name];
            } else {
                return false;
            }
        }

    }

?>