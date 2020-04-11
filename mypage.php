<?php
// Start the session
  session_start();
  if ($_SESSION['ss_login_status'] != 'logged_in') { // 로그인 상태 확인
	 	 echo ("<script>alert('로그인이 필요합니다.');</script>");
		 echo ("<meta http-equiv = 'refresh' content='0; url=./menutest.php'>");
  }
  else{
	
	require_once("./dbconn.php");
	
	$sql = "select * from mem";
	$result = mysqli_query($link, $sql);
	while($row = mysqli_fetch_object($result)){
		$point = $row->mem_point;	
	}

	$id = $_SESSION['ss_id'];

?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<title>마이페이지</title>
<style>
	.container {
	  margin: auto;
	  width: 150%;
	  border: 5px solid gray;
	  padding: 10px;
	  text-align : center;
	}
</style>
</head>

<body>
<div class="container">
  <h2>아이디 : <?=$id?> 접속중 / 포인트 : 4</h2>
  <table class="table">
    <thead>
      <tr>
        <th>번호</th>
        <th>사진</th>
        <th>카테고리</th>
        <th>시간</th>
        <th>장소</th>
      </tr>
    </thead>
    <tbody>
    <?php
		$sql = "select data_no, data_cata, data_pic, data_time, data_loc from data where data_id = '$id'";
		$result = mysqli_query($link, $sql);
		$no = 1;
		while($row = mysqli_fetch_object($result)){
			
	?>
      <tr>
        	<td><?=$no++?></td>
            <td><img src='<?=$row->data_pic?>' width='100px' height='50px'></td>
            <td><?=$row->data_cata?></td>
            <td><?=$row->data_time?></td>
            <td><?=$row->data_loc?></td>
      </tr>
      <?php
	  		
		}
	  ?>
    </tbody>
  </table>
  	<input type="submit" class="btn" value ="수정하기">
    <input type="submit" class="btn" value ="삭제하기">
</div>

</body>
</html>
<?php	
  }
?>
