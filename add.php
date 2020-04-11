<?php
 		require_once("./dbconn.php");
		
		$id = $_POST['nm_identi'];
		$pass = $_POST['nm_pass'];
		
		$sql = "insert into mem ";
		$sql.= " (mem_id, mem_pass) ";
		$sql.= "values ('$id', '$pass')";
		
		$result = mysqli_query($link, $sql);
		mysqli_fetch_object($result);
		
?>
<script>
	alert('회원가입이 완료되었습니다.');
</script>
<meta http-equiv = 'refresh' content='0; url=./login.php'>
