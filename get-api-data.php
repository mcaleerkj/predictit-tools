<?php

  //Create a stream
	$opts = array(
	  'http'=>array(
		'method'=>"GET",
		'header'=>"Accept: application/json" 
	  )
	);
	$context = stream_context_create($opts);
	// Open the file using the HTTP headers set above
	$file = file_get_contents('https://www.predictit.org/api/marketdata/ticker/' . htmlspecialchars($_GET["ticker"]), false, $context);
	$file = json_decode($file, true);
	//echo '<pre>';
	//print_r($file);
	//echo '</pre>';
	$fp = fopen('data/' . htmlspecialchars($_GET["ticker"]) . '.tsv', 'a');
	$time = $file['TimeStamp'];
	$parts = explode(".", (string)$time);
	$time_rounded = $parts[0];
	//echo $time_rounded;
	fwrite($fp, $time_rounded . "\t" . $file['Contracts'][0]['LastTradePrice'] . "\t" . $file['Contracts'][0]['BestBuyYesCost'] . "\t" . $file['Contracts'][0]['BestBuyNoCost'] . "\t" . $file['Contracts'][0]['BestSellYesCost'] . "\t" . $file['Contracts'][0]['BestSellNoCost']  . "\n");
	fclose($fp);
// Shorthand for $( document ).ready()

?>