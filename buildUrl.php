<?php
	//build url to use the allocine API
	define('PARTNER_ID', 'V2luZG93czg');
	define('PARTNER_KEY', 'e2b7fd293906435aa5dac4be670e7982');
	
	function buildUrlApiAllocine ($route, $tokens) {
		
		$sed = date("Ymd");
	
		$tokens[] = "partner=" . PARTNER_ID;
		$tokens[] = "format=json";
		
		sort($tokens);
		
		$tokensUrl = implode("&", $tokens);
		
		//Generate signature
		$sig = rawurlencode(base64_encode(sha1(PARTNER_KEY . $tokensUrl.'&sed='.$sed, true)));
		
		return 'http://api.allocine.fr/rest/v3/' . $route . '?' . $tokensUrl . "&sed=" . $sed . "&sig=" . $sig;
	}
	
	//EXAMPLE 1 - search
	$searchTokens[] = "q=avatar";
	$searchTokens[] = "filter=movie";
	$searchTokens[] = "count=50";
	$searchTokens[] = "page=1";
	
	$url = buildUrlApiAllocine("search", $searchTokens);
	
	//EXAMPLE 2 - movie data
	
	$movieTokens[] = "code=37607";
	
	$url = buildUrlApiAllocine("movie", $movieTokens);
	
?>