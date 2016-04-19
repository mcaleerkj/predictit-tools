<!DOCTYPE html>
<head>
<title>PredictIt Tools</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<!-- get data from Predicitit API -->
<?php
include("get-api-data.php");
?>


<script src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.16/d3.min.js"></script>
<div id="main">
	<h1 class="text-center"><?php echo $file['Contracts'][0]['LongName'];?></h1>
	<div id="sidebar-container" class="round">
		<div id="featured-image" class="round" style="background-image: url('<?php echo $file['Contracts'][0]['Image']?>')">
		</div>		
		<!-- TickerSymbol -->
		<a href="<?php echo $file['Contracts'][0]['URL']?>" target="_blank">		
			<h3 id="ticker-symbol" class="text-center">
				<?php echo $file['Contracts'][0]['TickerSymbol']?>
			<h3>
		</a>	
		<hr/>
		<!-- End date -->
		<div class="text-center current-stat">End date: <br/><?php echo $file['Contracts'][0]['DateEnd']?></div>
		<hr/>
		<!-- LastTradePrice -->
		<div class="text-center current-stat">LastTradePrice: <br/>$<?php echo $file['Contracts'][0]['LastTradePrice']?></div>	
		<hr/>
		<!-- BestBuyYesCost -->
		<div class="text-center current-stat">BestBuyYesCost: <br/>$<?php echo $file['Contracts'][0]['BestBuyYesCost']?></div>
		<!-- BestSellYesCost -->
		<div class="text-center current-stat">BestSellYesCost: <br/>$<?php echo $file['Contracts'][0]['BestSellYesCost']?></div>		
		<hr/>
		<!-- BestBuyNoCost -->
		<div class="text-center current-stat">BestBuyNoCost: <br/>$<?php echo $file['Contracts'][0]['BestBuyNoCost']?></div>	
		<!-- BestSellNoCost -->
		<div class="text-center current-stat">BestSellNoCost: <br/>$<?php echo $file['Contracts'][0]['BestSellNoCost']?></div>			
	</div><!--end sidebar -->
	<div id="right-container">
		<!--time menu-->
		<div id="time-menu">
			<div id="tb2" class="time-button">2 minutes</div>
			<div id="tb3" class="time-button">5 minutes</div>
			<div id="tb4" class="time-button">10 minutes</div>
			<div id="tb5" class="time-button">20 minutes</div>
			<div id="tb6" class="time-button">30 minutes</div>
			<div id="tb7" class="time-button">40 minutes</div>
			<div id="tb8" class="time-button">50 minutes</div>
			<div id="tb9" class="time-button">1 hour</div>
			<div id="tb10" class="time-button">3 hours</div>
			<div id="tb11" class="time-button">6 hours</div>
			<div id="tb1" class="time-button">9 hours</div>			
			<div id="tb12" class="time-button">12 hours</div>
			<div id="tb13" class="time-button">1 day</div>
			<div id="tb14" class="time-button">3 days</div>
			<div id="tb15" class="time-button">7 days</div>
			<div id="tb16" class="time-button">30 days</div>
			<div id="tb17" class="time-button">90 days</div>
		</div>	
		<!--d3 chart -->	
		<div id="chart-container">		
			<?php
				include("scriptjs.php");
			?>
		</div>
		<!-- data table -->
		<div id="table-container">
			<?php readfile("table-data.html");?>
		</div>
	</div>
</div>

<script>
//refresh page every one minute to capture data
setTimeout(function(){location.reload();}, 60000);

</script>
</body>
</html>