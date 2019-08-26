var marker;
    function initialize(){ 
      var infoWindow = new google.maps.InfoWindow;
      var mapOptions = { 
        mapTypeId: google.maps.MapTypeId.ROADMAP 
      } 
      var map = new google.maps.Map(document.getElementById('map'), mapOptions); 
      var bounds = new google.maps.LatLngBounds(); 
	  
	  var infoWindow = new google.maps.InfoWindow;
		
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.462417,  lng: 101.465967},
			  map: map,
              icon: '../assets/img/br.png',
			  title: 'Bukit Raya'
			});
			
			var html = "<b>Kec. Bukit Raya</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.545263,  lng: 101.462205},
			  map: map,
                 icon: '../assets/img/lp.png',
			  title: 'Lima Puluh'
			});
			
			var html = "<b>Kec. Lima Puluh</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          
          
          
			var marker = new google.maps.Marker({
			  position: {lat: 0.446204,    lng: 101.437158},
			  map: map,
                 icon: '../assets/img/md.png',
			  title: 'Marpoyan Damai'
			});
			
			var html = "<b>Kec. Marpoyan Damai</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
          
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.520228,   lng: 101.397472},
			  map: map,
                 icon: '../assets/img/ps.png',
			  title: 'Payung Sekaki'
			});
			
			var html = "<b>Kec. Payung Sekaki</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.517767,   lng: 101.450067},
			  map: map,
                 icon: '../assets/img/pku.png',
			  title: 'Pekanbaru Kota'
			});
			
			var html = "<b>Kec. Pekanbaru Kota</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
           //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.512513,   lng: 101.458364 },
			  map: map,
                 icon: '../assets/img/sl.png',
			  title: 'Sail'
			});
			
			var html = "<b>Kec. Sail</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
           //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.530553,   lng: 101.436374 },
			  map: map,
                 icon: '../assets/img/snp.png',
			  title: 'Senapelan'
			});
			
			var html = "<b>Kec. Senapelan</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.507660,  lng: 101.438931 },
			  map: map,
                 icon: '../assets/img/skj.png',
			  title: 'Sukajadi'
			});
			
			var html = "<b>Kec. Sukajadi</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.633952,    lng: 101.398101 },
			  map: map,
                 icon: '../assets/img/rm.png',
			  title: 'Rumbai'
			});
			
			var html = "<b>Kec. Rumbai</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.615131,   lng: 101.500106 },
			  map: map,
                 icon: '../assets/img/rp.png',
			  title: 'Rumbai Pesisir'
			});
			
			var html = "<b>Kec. Rumbai Pesisir</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.446112,  lng: 101.383188 },
			  map: map,
                 icon: '../assets/img/tmp.png',
			  title: 'Tampan'
			});
			
			var html = "<b>Kec. Tampan</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.518626,     lng: 101.536852 },
			  map: map,
                 icon: '../assets/img/tr.png',
			  title: 'Tenayan Raya'
			});
			
			var html = "<b>Kec. Tenayan Raya</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
		
		// Define the LatLng coordinates for the polygon's path.


		
		  // Construct the polygon.
        var polygon = new google.maps.Polygon({
          paths: br,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'blue',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: lp,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'red',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: md,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'yellow',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: ps,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'green',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
          var polygon = new google.maps.Polygon({
          paths: pku,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'black',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: rm,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'orange',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: rp,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'purple',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: sl,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'orange',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: snp,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'pink',
          fillOpacity: 0.3
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: skj,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: '#607d8b',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: tmp,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: '#e91e63',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: tr,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'gray',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
		
<?php 
  while($data = mysql_fetch_array($result)){
	  	$kategori = $data['kategori'];
	  	$nama = $data['nama'];
	  	$lat = $data['lat'];
	  	$lon = $data['lng'];
	  	$add=$data['alamat'];
	  	$id=$data['id_puskes'];
	  	$gmb=$data['gambar'];
		
	if($kategori=='Rumah Sakit'){
		echo("addMarker1($lat, $lon, '<div><p><img src=../../pulas_new/assets/img/$gmb style=width:25%;float:left;margin-right:10px;><h5>$kategori  $nama</h5> $add</p><a href=../info/?detailD=$id>Detail</a></div>')\n");}
	
	elseif ($kategori=='Puskesmas'){
		echo("addMarker2($lat, $lon, '<div><div><p><img src=../../pulas_new/assets/img/$gmb style=width:25%;float:left;margin-right:10px;><h5>$kategori  $nama</h5> $add</p><a href=../info/?detailD=$id>Detail</a></div>')\n");}
		
	else{
		echo("addMarker3($lat, $lon, '<div><p><img src=../../pulas_new/assets/img/$gmb style=width:25%;float:left;margin-right:10px;><h5>$kategori  $nama</h5> $add</p><a href=../info/?detailD=$id>Detail</a></div>')\n");}}
		
?> 
      function addMarker1(lat, lng, info){ 
        var lokasi = new google.maps.LatLng(lat, lng); 
        bounds.extend(lokasi);  
        var marker = new google.maps.Marker({ 
          map: map, 
          position: lokasi, 
          icon: '<?php echo '../assets/img/A.png';?>' 
        }); 
        map.fitBounds(bounds); 
        bindInfoWindow(marker, map, infoWindow, info); 
      }
      function addMarker2(lat, lng, info){ 
        var lokasi = new google.maps.LatLng(lat, lng); 
        bounds.extend(lokasi); 
        var marker = new google.maps.Marker({ 
          map: map, 
          position: lokasi, 
          icon: '<?php echo '../assets/img/AA.png';?>' 
        }); 
        map.fitBounds(bounds); 
        bindInfoWindow(marker, map, infoWindow, info); 
      } 
      function addMarker3(lat, lng, info){ 
        var lokasi = new google.maps.LatLng(lat, lng); 
        bounds.extend(lokasi); 
        var marker = new google.maps.Marker({ 
          map: map, 
          position: lokasi, 
          icon: '<?php echo '../assets/img/AAA.png';?>' 
        }); 
        map.fitBounds(bounds); 
        bindInfoWindow(marker, map, infoWindow, info); 
      } 
      function bindInfoWindow(marker, map, infoWindow, html){ 
        google.maps.event.addListener(marker, 'click', function(){ 
          infoWindow.setContent(html); 
          infoWindow.open(map, marker); 
        }); 
      } 
    }
    google.maps.event.addDomListener(window, 'load', initialize);