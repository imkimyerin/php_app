<?php
// Start the session
  session_start();
  require_once("./dbconn.php");
  $sql = "select * from data";
  $result = mysqli_query($link, $sql);
  $id = $_SESSION['ss_id'];
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <style>
	 body{ margin-top:20px; }
	</style>

</head>

<body>
<div class="container">
        <div class="row">        
        
<div class="col-md-3 col-lg-3">
	<h2>쓰레기찾아라 
    	<input type="button" value="로그인" onclick="location.href='login.php'" class="btn" >
     
    </h2>
    <div class="list-group">
		<a class="list-group-item" href="picture.php"><i class="glyphicon glyphicon-camera btn-lg"></i> 촬영</a>
		<a class="list-group-item" href="grobe.php"><i class="glyphicon glyphicon-globe btn-lg"></i> 지도</a>
		<a class="list-group-item" href="statistics.php"><i class="glyphicon glyphicon-stats btn-lg"></i> 통계</a>
        <a class="list-group-item" href="mypage.php"><i class="glyphicon glyphicon-user btn-lg"></i> 마이페이지</a>
      <?PHP
       	 if($id == 'hjk1808'){
	  ?>
		<a class="list-group-item" href="manager.php"><i class="glyphicon glyphicon-cog btn-lg"></i> 관리자</a>
      <?PHP
		 }
	  ?>
	</div>
</div>           
 <div class="col-md-9 col-lg-9">            
         
<p></p>

    </div>
    </div>
    <div class="container">
        <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>컴퓨터정보공학부 201695019 김예린</p>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>
</body>
</html>
