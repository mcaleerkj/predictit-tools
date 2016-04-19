<?php
   $marketsCSV =  array_map("str_getcsv", file("markets.csv"));
   //print_r($marketsCSV[0]);
   //Create a stream
	$opts = array(
	  'http'=>array(
		'method'=>"GET",
		'header'=>"Accept: application/json" 
	  )
	);   
     
   for ($i=0;$i<count($marketsCSV[0]); $i++) {
	   if ($i==0)
	   echo '<div id="market-menu-wrapper">';
		echo "<a class='ticker-menu-item' href='/predictit-tools/index.php?ticker=" . $marketsCSV[0][$i] . "'><span>\t" . $marketsCSV[0][$i] . "\t</span></a>";
	   if ($i==count($marketsCSV[0]))
	   echo '</div>';

		$context = stream_context_create($opts);
		// Open the file using the HTTP headers set above
		$file = file_get_contents('https://www.predictit.org/api/marketdata/ticker/' . $marketsCSV[0][$i], false, $context);
		$file = json_decode($file, true);
		//echo '<pre>';
		//print_r($file);
		//echo '</pre>';
		
		//write to (and create) file if data not empty
		if (isset($file)){
			$fp = fopen('data/' . $marketsCSV[0][$i] . '.tsv', 'a');
			$time = $file['TimeStamp'];
			$parts = explode(".", (string)$time);
			$time_rounded = $parts[0];
			//echo $time_rounded;
			
			//if file is empty, add headers
			if (filesize('data/' . $marketsCSV[0][$i] . '.tsv') == 0){
				fwrite($fp, "date\tLastTradePrice\tBestBuyYesCost\tBestBuyNoCost\tBestSellYesCost\tBestSellNoCost" . "\n");
			}
			
			fwrite($fp, $time_rounded . "\t" . $file['Contracts'][0]['LastTradePrice'] . "\t" . $file['Contracts'][0]['BestBuyYesCost'] . "\t" . $file['Contracts'][0]['BestBuyNoCost'] . "\t" . $file['Contracts'][0]['BestSellYesCost'] . "\t" . $file['Contracts'][0]['BestSellNoCost']  . "\n");
			fclose($fp);
		}
   }
   
	$context = stream_context_create($opts);
	// Open the file using the HTTP headers set above
	$file = file_get_contents('https://www.predictit.org/api/marketdata/ticker/' . htmlspecialchars($_GET["ticker"]), false, $context);
	$file = json_decode($file, true);

   

?>