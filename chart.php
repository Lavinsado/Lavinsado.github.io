<?php  
	include "header.php";
?>
<html>
<head>
	<style>
		#chart-container {
		    height: 50vh;
  			width: 50vw;
		    position: center, relative;
            display: block;
		    margin: 10em auto 5em auto;
		}
	</style>
</head>
<body>
	<div class="mx-auto" id="chart-container">
        <canvas id="downloadChart"></canvas>
    	<button class="btn btn-success" id="addData">Add Data</button>
    	<button class="btn btn-info" id="deleteData">Delete Data</button>
    </div>
</body>
</html>
<script>
	$(document).ready(function () {
		var max = 5;
	    showGraph(max);
	    $("#addData").click(function(){
	    	showGraph(++max);
            window.downloadBarChart.update();
	    });
	    $("#deleteData").click(function(){
	    	showGraph(--max);
            window.downloadBarChart.update();
	    });
	});
	function showGraph(max)
	{
        $.post("chartexample.php", function (data){
            
            var title = [];
            var downloadCount = [];
            var readCount = [];
        
            if (data.length < 5) {
            	max = data.length;
            }
            if (max > data.length) {
                console.log("Already Max");
                max = data.length;
            }
			console.log(max);
            for (var i = 0; i < max; i++) {
                title.push(data[i].judul_buku);
                downloadCount.push(data[i].download_count);
                readCount.push(data[i].read_count);	
            }

           var horizontalBarData = {
                labels: title,
                datasets: [
                    {
                        label: 'Download Count',
                        backgroundColor: '#49e2ff',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: downloadCount
                    },
                    {
                    	label: 'Read Count',
                        backgroundColor: '#b45555',
                        borderColor: '#c37878',
                        hoverBackgroundColor: '#e5c6c6',
                        hoverBorderColor: '#f2e8e8',
                        data: readCount
                    }
                ]
            };
            var graphTarget = $("#downloadChart");
            window.downloadBarChart = new Chart(graphTarget, {
                type: 'horizontalBar',
                data: horizontalBarData,
                options:{
                    events: ['click'],
                	scales:{
                		xAxes:[
                			{
                				ticks:{
                					beginAtZero:true
                				}
                			}
                		],
                		yAxes:[
                			{
                				gridLines: {
							        display: false
							    }
                			}
                		]
                	}
                }
            });
        });
	}
</script>