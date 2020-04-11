<?php
// Start the session
  session_start();
  if ($_SESSION['ss_login_status'] != 'logged_in') { // 로그인 상태 확인
	 	 echo ("<script>alert('로그인이 필요합니다.');</script>");
 	 	echo ("<meta http-equiv='refresh' content='0; url=./menutest.php?page=login'>");
  }else{
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/base.css" type="text/css" media="screen">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title>촬영</title>
 <style>
    body {
        background: #f8f8f8;
        padding: 40px 0;
    }
    
    #login-form > div {
        margin: 20px 0;
    }
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
      <form action="./upload.php" method="post" id="login-form" enctype="multipart/form-data">
      <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
        <section class="main-content">
            <p>
             <input type="file" id="camera" name="camera" capture="camera" accept="image/*" />
             <br/>
  			 <img id="pic" style="width:100%;" />
            </p> 
            <p><img src="about:blank" alt="" id="show-picture"></p> 
        </section>
        <label for="commit" class="tit">쓰레기종류선택&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        
            <select name="nm_trash" required>
              <option value="">쓰레기종류</option>
              <option value="paper">종이</option>
              <option value="can">캔</option>
              <option value="plastic">플라스틱</option>
              <option value="dambae">담배꽁초</option>
              <option value="acc">기타</option>
            </select>
            <br>
            <label for="commit" class="tit">위치검색</label>
    		<input type="text"name ="nm_lng" id="latlng" placeholder="위도입력" required>
            <input type="text"name ="nm_lat" id="latlng" placeholder="경도입력" required>
            <br>
            <label for="commit" class="tit">요청사항</label>
            <textarea cols="22" rows="2" id="comment"></textarea>
           <div>
            <button type="submit" class="btn">저장</button>
           </div>
      </form>
  </div>
 <?PHP
  }
  ?>
    <script >
		//사진저장
    	$(function(){
                $('#camera').change(function(e){
                    $('#pic').attr('src', URL.createObjectURL(e.target.files[0]));
                });
            });
		//내위치찾기
	 var x = document.getElementById("demo");

		function getLocation() {
		  if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		  } else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
		  }
		}
		
	</script>
</body>

</html>
