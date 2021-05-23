<html>
	<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="tabela.css" rel="stylesheet">
    <link href="map.css" rel="stylesheet">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Harta</title>    
   </head>

	<body>
    <div class="background">

        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarCollapse">
                <form class="d-flex">
                </form>
                </div>
            </div>
        </nav>

    <main class="container"><div id="map"></div></main>
    
    <?php	
            $conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
            mysqli_select_db($conn, "users");
            $sql_read = "SELECT * FROM locatii";

            $result = mysqli_query($conn, $sql_read);
            if(!$result)
            {
                die('Could not read data: ' . mysqli_error());
            }

            while($row = mysqli_fetch_array($result)) {
                $data[] = array('nume' => $row['nume'], 'latitudine' => $row['latitudine'], 'longitudine' => $row['longitudine'], 'culoare' => $row['culoare'], 'dimensiune' => $row['dimensiune']);	
            }
    ?>

    <script>
        var locations = <?php echo json_encode($data); ?>;

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {lat: 45.69269695279096, lng: 25.464859752697773}
            });
            

            var infowindow = new google.maps.InfoWindow();
		
            for (var i = 0; i < locations.length; i++) {
                console.log(locations[i]);
            }
            
            var marker, i;
            const API_Key = "af69a0e7afa5250e9e7dd1dedb94b04e";

            for (i = 0; i < locations.length; i++) {
                var url = "http://labs.google.com/ridefinder/images/mm_20_";
                url += locations[i].culoare  + ".png";

                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i].latitudine, locations[i].longitudine),
                    map: map,
                    icon:{url:url},
                    scaledSize: new google.maps.Size(locations[i].dimensiune, (locations[i].dimensiune + 20))
                });


                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function(){
                        fetch('https://api.openweathermap.org/data/2.5/weather?lat=' + locations[i].latitudine + '&lon=' + locations[i].longitudine +'&units=metric&appid='+ API_Key)
                            .then(res => res.json())
                            .then(data => {
                                var iconcode = data.weather[0].icon;
                                var iconurl = "http://openweathermap.org/img/w/" + iconcode + ".png";
                                var num = locations[i].nume;
                                var temp = 'Temp: ' + data.main.temp + '°c';
                                var hum = 'Humidity: ' + data.main.humidity + ' mmHg';
                                var wind = 'Wind speed: ' + data.wind.speed + ' km/h';
                                var desc = 'Weather description: ' + data.weather[0].description;
                                infowindow.setContent(num + "<br>" + "<img src=" + iconurl + " >" + "<br>" + temp + "<br>" + hum + "<br>" + wind + "<br>" + desc);
                                infowindow.open(map, marker);
                        });
                    }
                    })(marker, i));
            }
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByKEo-eVV5YXXbbpGUsL7_Leuxb8c543U&callback=initMap">
    </script>

    </div>
	</body>
</html>