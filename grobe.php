<?php
// Start the session
  session_start();
  
  require_once("./dbconn.php");
  
  if ($_SESSION['ss_login_status'] != 'logged_in') { // 로그인 상태 확인
	 	 echo ("<script>alert('로그인이 필요합니다.');</script>");
		 echo ("<meta http-equiv = 'refresh' content='0; url=./menutest.php'>");
  } else {
 
	$sql = "select * from data ";
	
	$lat = array();
	$lng = array();
	$time = array();
	$id = array();
	$pic = array();
	$cata = array();
	
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) >= 1){
			$no = 0;
			while($row = mysqli_fetch_object($result)){	
				$temp = explode(',',$row->data_loc);
				$lat[$no] = $temp[0];
				$lng[$no] = $temp[1];
				$time[$no] = $row->data_time;
				$id[$no] = $row->data_id;
				$pic[$no] = $row->data_pic;
				$cata[$no] = $row->data_cata;
				$no++;
			}//while
			
		}//if
	}//if
	
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<title>지도</title>
<style>
	.container {
	  margin: auto;
	  width: 80%;
	  border: 5px solid gray;
	  padding: 30px;
	  text-align : center;
	}
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
</style>
</head>

<body>
  <div class="container">
    <div id="map" style="width:100%;height:450px;"></div>
	<p><em>쓰레기의 위치를 표시합니다!</em></p>
    <script>
		function init() {
        	
            // execute
            (function() {
                // map options
				/*
                var options = {
                    zoom: 17,
                    center: new google.maps.LatLng(35.168191, 128.996279), // centered US
                    mapTypeId: google.maps.MapTypeId.TERRAIN,
                    mapTypeControl: false
                };
				*/
			   var latlng = {lat: 35.168191, lng:128.996279};

				var map = new google.maps.Map(document.getElementById('map'), {
				  zoom: 13,
				  center: latlng // SILLA UNIV.
				});

                // init map
                //var map = new google.maps.Map(document.getElementById('map'), options);

                // NY and CA sample Lat / Lng
				
                var lat =  <?php echo json_encode($lat); ?>;
				var lng = <?php echo json_encode($lng); ?>;
				var id = <?php echo json_encode($id); ?>;
				var time = <?php echo json_encode($time); ?>;
				var pic = <?php echo json_encode($pic); ?>;
				var cata = <?php echo json_encode($cata); ?>;
				
                // set multiple marker
                for (var i = 0; i < lat.length; i++) {
                    // init markers
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(lat[i], lng[i]),
                        map: map,
                        title: 'Click Me ' + i
                    });

                    // process multiple info windows
                    (function(marker, i) {
                        // add click event
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow = new google.maps.InfoWindow({
                                content: '<img src=' + pic[i] + ' width="100px" height="100px">' + '<br>id : '+id[i]+'<br>cata : '+cata[i]+'<br>time : '+time[i]
                            });
                            infowindow.open(map, marker);
                        });
                    })(marker, i);
                }
            })();
       
     	}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrzc6VJhjgHUvU1Czq3fEUyVWBA44Y4J4&callback=init">
    </script>
</body>
</html>

<?php
		}
?>
