<?php
// Start the session
  session_start();
  if ($_SESSION['ss_login_status'] != 'logged_in') { // 로그인 상태 확인
	 	 echo ("<script>alert('로그인이 필요합니다.');</script>");
 	 	 echo ("<meta http-equiv = 'refresh' content='0; url=./menutest.php'>");
  } else{
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<title>관리자모드</title>
<style>
	.container {
	  margin: auto;
	  width: 80%;
	  border: 5px solid gray;
	  padding: 10px;
	  text-align : center;
	}
</style>
</head>

<body>
  <div class="container">
  	<h2>관리자 설정 페이지</h2>
    <p>1. 쓰레기 종류 수정/삭제/입력</p>
    <?PHP
		$sql = "delete from data where data_id in ( select data_id from data where data_cata = '$cata')";  		//delete
		$sql = "update data set data_cata = '$cata' where data_id = '$id'";					//update
	?>
    <input type="submit" value="수정">
     <input type="submit" value="삭제">
    <p>2. 회원정보 삭제기능</p>
    <?PHP
		$sql = "delete from mem where mem_id in ( select mem_id from mem where mem_id = '$selectid')";  		//delete
	?>
     <input type="submit" value="수정">
     <input type="submit" value="삭제">
  </div>
</body>
</html>
 <?PHP
  }
  ?>
<script>
	
</script>