<script>
//	(LastTradePrice, BestBuyYesCost, BestSellYesCost, BestSellNoCost, BestSellNoCost);
var stateArray = [true, true, true, true, true];
var the_minutes = 4181;
var margin = {
		top: 20,
		right: 80,
		bottom: 30,
		left: 50
	},
	width = 715 - margin.left - margin.right,
	height = 300 - margin.top - margin.bottom;

//formatters
var parseDate = d3.time.format("%Y-%m-%dT%H:%M:%S").parse;
var dollar2 = d3.format('$.2f');
var dollar3 = d3.format('$.3f');
var varianceForm = d3.format(".6f");
var stdDevForm = d3.format(".4f");

var x = d3.time.scale()
	.range([0, width]);

var y = d3.scale.linear()
	.range([height, 0]);

var color = d3.scale.category10();

var xAxis = d3.svg.axis()
	.scale(x)
	.orient("bottom");

var yAxis = d3.svg.axis()
	.scale(y)
	.orient("left")
	.tickFormat(dollar2);;

var line = d3.svg.line()
	.interpolate("basis")
	.x(function(d) {
		return x(d.date);
	})
	.y(function(d) {
		return y(d.price);
	});
var lineCount = 0;

var svg = d3.select("#chart-container").append("svg")
	.attr("width", width + margin.left + margin.right)
	.attr("height", height + margin.top + margin.bottom)
	.append("g")
	.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

var	LastTradePriceArray = [], 
		BestBuyYesCostArray = [], 
		BestBuyNoCostArray = [], 
		BestSellYesCostArray = [], 
		BestSellNoCostArray = []
		LastClosePriceArray = [];
	
var the_tsv = "<?php echo htmlspecialchars($_GET["ticker"]) ?>";

jQuery("#tb1").click(function(){
	the_minutes=2;
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
});
jQuery("#tb2").click(function(){
	the_minutes=5;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
});
jQuery("#tb3").click(function(){
	the_minutes=10;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
});
jQuery("#tb4").click(function(){
	the_minutes=20;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
});
jQuery("#tb5").click(function(){
	the_minutes=30;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
});
jQuery("#tb6").click(function(){
	the_minutes=40;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
});
jQuery("#tb7").click(function(){
	the_minutes=50;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
});
jQuery("#tb8").click(function(){
	the_minutes=60;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
});
jQuery("#tb9").click(function(){
	the_minutes=180;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");
	jQuery(this).toggleClass("active-time");	
});
jQuery("#tb10").click(function(){
	the_minutes=360;
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
});
jQuery("#tb11").click(function(){
	the_minutes=540;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
});
jQuery("#tb12").click(function(){
	the_minutes=720;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
});
jQuery("#tb13").click(function(){
	the_minutes=1440;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
});
jQuery("#tb14").click(function(){
	the_minutes=4320;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
});
jQuery("#tb15").click(function(){
	the_minutes=10080;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
});
jQuery("#tb16").click(function(){
	the_minutes=43200;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
});
jQuery("#tb17").click(function(){
	the_minutes=129600;
	updateData(the_minutes, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);
	jQuery(this).siblings().removeClass("active-time");	
	jQuery(this).toggleClass("active-time");	
});

//dynamically remove or add lines
jQuery(function() {
	jQuery("#LastTradePrice").click(function(){
		var sel = "#chart-container > svg > g > g:nth-child(3)";		
		jQuery(sel).toggleClass("hide");
		jQuery(this).toggleClass("deactivated");
		console.log("LastTradePrice");
		updateData(the_minutes, 
			stateArray[0]==true ? stateArray[0]=false : stateArray[0]=true,
			stateArray[1], 
			stateArray[2], 
			stateArray[3], 
			stateArray[4]);
	});
	jQuery("#BestBuyYesCost").click(function(){
		var sel = "#chart-container > svg > g > g:nth-child(4)";		
		jQuery(sel).toggleClass("hide");
		jQuery(this).toggleClass("deactivated");	
		updateData(the_minutes, 
			stateArray[0],
			stateArray[1]==true ? stateArray[1]=false : stateArray[1]=true, 
			stateArray[2], 
			stateArray[3], 
			stateArray[4]);
	});
	jQuery("#BestSellYesCost").click(function(){
		var sel = "#chart-container > svg > g > g:nth-child(5)";		
		jQuery(sel).toggleClass("hide");
		jQuery(this).toggleClass("deactivated");	
		updateData(the_minutes, 
			stateArray[0],
			stateArray[1], 
			stateArray[2]==true ? stateArray[2]=false : stateArray[2]=true, 
			stateArray[3], 
			stateArray[4]);
	});
	jQuery("#BestBuyNoCost").click(function(){
		var sel = "#chart-container > svg > g > g:nth-child(6)";		
		jQuery(sel).toggleClass("hide");
		jQuery(this).toggleClass("deactivated");
		updateData(the_minutes, 
			stateArray[0],
			stateArray[1], 
			stateArray[2], 
			stateArray[3]==true ? stateArray[3]=false : stateArray[3]=true, 
			stateArray[4]);
	});
	jQuery("#BestSellNoCost").click(function(){
		var sel = "#chart-container > svg > g > g:nth-child(7)";		
		jQuery(sel).toggleClass("hide");
		jQuery(this).toggleClass("deactivated");
		updateData(the_minutes, 
			stateArray[0],
			stateArray[1], 
			stateArray[2], 
			stateArray[3], 
			stateArray[4]==true ? stateArray[4]=false : stateArray[4]=true);
	});	
	jQuery("#tb17").trigger("click");
});

//updateData(numMinutes, lastTradePrice, bestBuyYesCost, bestSellYesCost, bestBuyNoCost, bestSellNoCost)
updateData(2, stateArray[0], stateArray[1], stateArray[2], stateArray[3], stateArray[4]);

function updateData(numMinutes, lastTradePrice, bestBuyYesCost, bestSellYesCost, bestBuyNoCost, bestSellNoCost) {
	//first make sure other charts are removed;
	d3.selectAll("svg").remove();
	jQuery("svg").remove();
	LastTradePriceArray = [];
	BestBuyYesCostArray = [];
	BestBuyNoCostArray = [];
	BestSellYesCostArray = []; 
	BestSellNoCostArray = [];
	LastClosePriceArray = [];	
	
	margin = {
			top: 20,
			right: 80,
			bottom: 30,
			left: 50
		},
		width = 715 - margin.left - margin.right,
		height = 300 - margin.top - margin.bottom;

	//formatters
	parseDate = d3.time.format("%Y-%m-%dT%H:%M:%S").parse;
	dollar2 = d3.format('$.2f');
	dollar3 = d3.format('$.3f');
	varianceForm = d3.format(".6f");
	stdDevForm = d3.format(".4f");

	x = d3.time.scale()
		.range([0, width]);

	y = d3.scale.linear()
		.range([height, 0]);

	color = d3.scale.category10();

	xAxis = d3.svg.axis()
		.scale(x)
		.orient("bottom");

	yAxis = d3.svg.axis()
		.scale(y)
		.orient("left")
		.tickFormat(dollar2);;

	line = d3.svg.line()
		.interpolate("basis")
		.x(function(d) {
			return x(d.date);
		})
		.y(function(d) {
			return y(d.price);
		});
	lineCount = 0;

	svg = d3.select("#chart-container").append("svg")
		.attr("width", width + margin.left + margin.right)
		.attr("height", height + margin.top + margin.bottom)
		.append("g")
		.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

	LastTradePriceArray = [], 
			BestBuyYesCostArray = [], 
			BestBuyNoCostArray = [], 
			BestSellYesCostArray = [], 
			BestSellNoCostArray = []
			LastClosePriceArray = [];
		
	the_tsv = "<?php echo htmlspecialchars($_GET["ticker"]) ?>";
	
	//function to get d3 data
	d3.tsv("data/" + the_tsv + ".tsv", function(error, data) {
    if (error) throw error;
	
	//filter data//
	//console.log("data: " + JSON.stringify(data));
	var cutoffDate = new Date();
	// 210 + how many minutes
	cutoffDate.setMinutes(cutoffDate.getDate() - (235+numMinutes));	
	//console.log("cutoffDate: " + cutoffDate);
	cutoffDate = cutoffDate.toISOString().split(".");
	//console.log("cutoffDate: " + cutoffDate);
	
	//filter function
	//filter date
	data = data.filter(function(d) {
		//console.log("d.date: " + d.date);
		//console.log("cutoffDate: " + cutoffDate[0]);
		return d.date > cutoffDate;
	});
	//console.log("data (post-filter): " + JSON.stringify(data));

	data.forEach(function(value, i) {
		if (!lastTradePrice)
		delete data[i].LastTradePrice;
		if (!bestBuyYesCost)
		delete data[i].BestBuyYesCost;
		if (!bestSellYesCost)
		delete data[i].BestSellYesCost;
		if (!bestBuyNoCost)
		delete data[i].BestBuyNoCost;
		if (!bestSellNoCost)
		delete data[i].BestSellNoCost;	
	})
	//console.log("data (post-filter2): " + JSON.stringify(data));	
	//buttons to display or hide line for each categor
	
	data.forEach(function(d) {
		if (lastTradePrice)
		LastTradePriceArray.push(d['LastTradePrice']);
		if (bestBuyYesCost)
		BestBuyYesCostArray.push(d['BestBuyYesCost']);
		if (bestBuyNoCost)
		BestBuyNoCostArray.push(d['BestBuyNoCost']);
		if (bestSellYesCost)
		BestSellYesCostArray.push(d['BestSellYesCost']);
		if (bestSellNoCost)
		BestSellNoCostArray.push(d['BestSellNoCost']);	
	});	
	
	updateTable();
	function updateTable() {
		//mean
		jQuery("#last-trade-price-mean").html(dollar3(d3.mean(LastTradePriceArray)));
		jQuery("#best-buy-yes-cost-mean").html(dollar3(d3.mean(BestBuyYesCostArray)));	
		jQuery("#best-buy-no-cost-mean").html(dollar3(d3.mean(BestBuyNoCostArray)));			
		jQuery("#best-sell-yes-cost-mean").html(dollar3(d3.mean(BestSellYesCostArray)));	
		jQuery("#best-sell-no-cost-mean").html(dollar3(d3.mean(BestSellNoCostArray)));
		//median
		jQuery("#last-trade-price-median").html(dollar3(d3.median(LastTradePriceArray)));
		jQuery("#best-buy-yes-cost-median").html(dollar3(d3.median(BestBuyYesCostArray)));	
		jQuery("#best-buy-no-cost-median").html(dollar3(d3.median(BestBuyNoCostArray)));			
		jQuery("#best-sell-yes-cost-median").html(dollar3(d3.median(BestSellYesCostArray)));	
		jQuery("#best-sell-no-cost-median").html(dollar3(d3.median(BestSellNoCostArray)));		
		//variance
		jQuery("#last-trade-price-variance").html(varianceForm(d3.variance(LastTradePriceArray)));
		jQuery("#best-buy-yes-cost-variance").html(varianceForm(d3.variance(BestBuyYesCostArray)));	
		jQuery("#best-buy-no-cost-variance").html(varianceForm(d3.variance(BestBuyNoCostArray)));			
		jQuery("#best-sell-yes-cost-variance").html(varianceForm(d3.variance(BestSellYesCostArray)));	
		jQuery("#best-sell-no-cost-variance").html(varianceForm(d3.variance(BestSellNoCostArray)));
		//stddev
		jQuery("#last-trade-price-stddev").html(stdDevForm(d3.deviation(LastTradePriceArray)));
		jQuery("#best-buy-yes-cost-stddev").html(stdDevForm(d3.deviation(BestBuyYesCostArray)));	
		jQuery("#best-buy-no-cost-stddev").html(stdDevForm(d3.deviation(BestBuyNoCostArray)));			
		jQuery("#best-sell-yes-cost-stddev").html(stdDevForm(d3.deviation(BestSellYesCostArray)));	
		jQuery("#best-sell-no-cost-stddev").html(stdDevForm(d3.deviation(BestSellNoCostArray)));			
		
	}
    color.domain(d3.keys(data[0]).filter(function(key) {
        return key !== "date";
    }));

    data.forEach(function(d) {
        d.date = parseDate(d.date);
    });

    var markets = color.domain().map(function(name) {
        return {
            name: name,
            values: data.map(function(d) {
                return {
                    date: d3.time.hour.offset(d.date, -3),
                    price: +d[name]
                };
            })
        };
    });
	
    x.domain(d3.extent(data, function(d) {
        return d3.time.hour.offset(d.date, -3);
    }));
    y.domain([
        d3.min(markets, function(c) {
            return d3.min(c.values, function(v) {
                return v.price;
            });
        }),
        d3.max(markets, function(c) {
            return d3.max(c.values, function(v) {
                return v.price;
            });
        })
    ]);

    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

    svg.append("g")
        .attr("class", "y axis")
        .call(yAxis)
        .append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", 6)
        .attr("dy", ".71em")
        .style("text-anchor", "end")
        .text("price ($)");

    var market = svg.selectAll(".market")
        .data(markets)
        .enter().append("g")
        .attr("class", "market");

    market.append("path")
        .attr("class", "line")
        .attr("d", function(d) {
            return line(d.values);
        })
        .style("stroke", function(d) {
            return color(d.name);
        });

    market.append("text")
        .datum(function(d) {
            return {
                name: d.name,
                value: d.values[d.values.length - 1]
            };
        })
        .attr("transform", function(d) {
            return "translate(" + x(d.value.date) + "," + y(d.value.price) + ")";
        })
        .attr("x", 3)
        .attr("dy", ".35em")
        .text(function(d) {
            return d.name;
        });
	});
}
</script>