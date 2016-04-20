<!DOCTYPE html>
<head>
<title>PredictIt Tools Server</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<!-- get data from Predicitit API -->
<?php
include("get-api-data.php");
?>

<div id="#timer">

</div>


<script>
//refresh page every one minute to capture data
setTimeout(function(){location.reload();}, 60000);
var time_left=60;
setInterval(function() {
	time_left--;
	document.getElementById("#timer").innerHTML = "Fresh data download from PredictIt in " + time_left + " seconds";
	
},1000);

</script>
</body>
</html>