<?php
// Start the session
  session_start();
  
  require_once("./dbconn.php");
  
  if ($_SESSION['ss_login_status'] != 'logged_in') { // 로그인 상태 확인
	 	 echo ("<script>alert('로그인이 필요합니다.');</script>");
		 echo ("<meta http-equiv = 'refresh' content='0; url=./menutest.php'>");
  } else {
  
     	$uploaddir = './upload/';
		$uploadfile = $uploaddir . basename($_FILES['camera']['name']);
		
		if (move_uploaded_file($_FILES['camera']['tmp_name'], $uploadfile)) {
			echo "성공적으로 업로드 되었습니다.\n";
			//echo ("<meta http-equiv = 'refresh' content='0; url=./menutest.php'>");
		}	
		
		$id = $_SESSION['ss_id'];
		$cata = $_POST['nm_trash'];
		$location = $_POST['nm_lng'].",".$_POST['nm_lat'];
		
		$sql = "insert into data ";
		$sql.= " (data_id, data_pic, data_cata, data_time, data_loc) ";
		$sql.= " values ('$id', '$uploadfile', '$cata', NOW(), '$location')";
		
		$result = mysqli_query($link, $sql);

		$sql2 = "update mem set ";
		$sql2 .= " mem_point = mem_point + 1 where mem_id ='$id'";
		
		$result2 = mysqli_query($link, $sql2);
		
		
		echo ("<meta http-equiv = 'refresh' content='0; url=./grobe.php'>");
  }
?>
