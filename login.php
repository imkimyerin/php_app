<?php
// Start the session
  session_start();

?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
<title>login</title>
 <style>
    body {
        background: #f8f8f8;
        padding: 60px 0;
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
 <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
   <div class="panel panel-success">
   
     <div class="panel-heading">
       <h4>로그인</h4>
     </div>
     
     <div class="panel-body">
        <form action="./loginpass.php" method="post" id="login-form">
           <div>
             <input type="text" class="form-control" name="nm_id" placeholder="Username" autofocus>
           </div>
           <div>
             <input type="password" class="form-control" name="nm_pw" placeholder="Password">
           </div>
           <div>
             <button type="submit" class="btn">로그인</button>
           </div>
        </form>
    </div>
    <a id="kakao-login-btn"></a>
    <a href="http://developers.kakao.com/logout"></a>
    <script type='text/javascript'>
      //<![CDATA[
        // 사용할 앱의 JavaScript 키를 설정해 주세요.
        Kakao.init('8b005775c5c42d4d2e9625ecb86f1368');
        // 카카오 로그인 버튼을 생성합니다.
        Kakao.Auth.createLoginButton({
          container: '#kakao-login-btn',
          success: function(authObj) {
            alert(JSON.stringify(authObj));
          },
          fail: function(err) {
             alert(JSON.stringify(err));
          }
        });
      //]]>
    </script>
   <div class="panel panel-success">
     
    <div class="panel-heading">
      <h4>회원가입</h4>
     </div>
         
     <div class="panel-body">
         <form action="./add.php" method="post" id="login-form">
         <div>
            <input type="text" class="form-control" name="nm_identi" placeholder="아이디를 입력해주세요" value='<?=$id?>'>
         </div>
         
         <div>
            <input type="password" class="form-control" name="nm_pass" id="id_pass" placeholder="비밀번호를 입력해주세요" value='<?=$pass?>'>
         </div>
         <div>
           <button type="submit" class="btn">회원가입</button>
         </div>
         </form>
      </div>
      
    </div>
  </div>
</div>
</body>
</html>