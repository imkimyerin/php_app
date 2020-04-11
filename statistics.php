<?php
// Start the session
  session_start();
  if ($_SESSION['ss_login_status'] != 'logged_in') { // 로그인 상태 확인
	 	 echo ("<script>alert('로그인이 필요합니다.');</script>");
 	 	echo ("<meta http-equiv='refresh' content='0; url=./menutest.php'>");
  }else{

	
	$sql = "select data_id, count(data_cata) as cnt from data GROUP BY data_id limit 3";
	$result = mysqli_query($link, $sql); 
	if(mysqli_num_rows($result) >= 1){
		$no = 1;
		while($row = mysqli_fetch_object($result)){
			$no ++;
		}
	}
	
	$sql2 = "select data_format(data_time, '%Y%m%d') as date, count(*) as cnt from data group by date_format(data_time, '%Y%m%d') order by date desc";
	$result2 = mysqli_query($link, $sql2); 
	if(mysqli_num_rows($result2) >= 1){
		$no = 1;
		while($row = mysqli_fetch_object($result2)){
			$no ++;
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>통계</title>
<style>
	.container {
	  margin: auto;
	  width: 160%;
	  border: 5px solid gray;
	  padding: 10px;
	  text-align : center;
	}
</style>
</head>

<body>
  <div class="container">
  	<h2>쓰래기 찾아라 통계보기</h2>
    
    <h3>1. 가장 포인트가 많은 순서</h3>
    <div id="piechart">

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
        <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
        // Draw the chart and set the chart values
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
          ['$id', 'Hours per Day'],
          ['hjk1808', 4],
          ['wow', 1],
          ['idcheck', 2],
        ]);
        
          // Optional; add a title and set the width and height of the chart
          var options = {'title':'가장 포인트가 많은 순서로 정렬', 'width':550, 'height':400};
        
          // Display the chart inside the <div> element with id="piechart"
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);
        }
        </script>
    </div>
    
    <h3>2. 많이 올라온 날짜별 순서</h3>
	<div>

    </div>
    
    <h3>3. 전체적으로 많이 올라온 쓰레기 순서</h3>
    <div>
    
    </div>
    
  </div>
</body>
 <?PHP
  }
  ?>
</html>
