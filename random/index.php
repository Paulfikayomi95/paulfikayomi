<!DOCTYPE html>
<html>
<head>
	<title>Donut</title>
</head>
<style>
#bord{
	border: 5px dashed red;
}
button{
	position: absolute;
	top: 150px;
	left: 40px;
}
#chart {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  width: 360px;
  height: 360px;
  position: relative;
  margin: 0 auto;
}
path.slice{
	stroke-width:2px;
}
polyline{
	opacity: .3;
	stroke: black;
	stroke-width: 2px;
	fill: none;
} 
svg text.percent{
	fill:white;
	text-anchor:middle;
	font-size:12px;
}

</style>
<body>
<div id="bord">
<div id="chart"></div>
<button onClick="changeData()">Change Data</button>
</div>
<script src="d3.min.js"></script>
<script src="donut.js"></script>
<script>

var salesData=[
	{label:"Basic", color:"#3366CC"},
	{label:"Plus", color:"#DC3912"},
	{label:"Lite", color:"#FF9900"},
	{label:"Elite", color:"#109618"},
	{label:"Delux", color:"#990099"}
];

var svg = d3.select("#chart").append("svg").attr("width",700).attr("height",300);

svg.append("g").attr("id","salesDonut");
svg.append("g").attr("id","quotesDonut");

donut.draw("salesDonut", randomData(), 150, 150, 130, 100, 30, 0.4);
donut.draw("quotesDonut", randomData(), 450, 150, 130, 100, 30, 0);
	
function changeData(){
	donut.transition("salesDonut", randomData(), 130, 100, 30, 0.4);
	donut.transition("quotesDonut", randomData(), 130, 100, 30, 0);
}

function randomData(){
	return salesData.map(function(d){ 
		return {label:d.label, value:1000*Math.random(), color:d.color};});
}
</script>
</body>
</html>