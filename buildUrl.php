<?php
	//build url vers api allocine
	
	function buildUrlApiAllocine ($route, $tokens) {
		
		$sed = date("Ymd");
	
		$tokens[] = "partner=V2luZG93czg";
		$tokens[] = "format=json";
		
		sort($tokens);
		
		$tokensUrl = implode("&", $tokens);
		
		$sig = rawurlencode(base64_encode(sha1('e2b7fd293906435aa5dac4be670e7982'.$tokensUrl.'&sed='.$sed, true)));
		
		return 'http://api.allocine.fr/rest/v3/' . $route . '?' . $tokensUrl . "&sed=" . $sed . "&sig=" . $sig;
	}
	
	//EXAMPLE 1
	
	$tokens[] = "code=37607";
	
	$url = buildUrlApiAllocine("movie", $tokens);
?>