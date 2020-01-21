<?php 
	//$this->load->view('common/header');
	
?>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDj1Rs87JgSp5oK3bfK6vI-eIG0MzKEfkI&callback=initMap"
  type="text/javascript"></script>

  <script async defer src="https://maps.googleapis.com/maps/api/distancematrix/json?origins=Seattle&destinations=San+Francisco&key=AIzaSyDj1Rs87JgSp5oK3bfK6vI-eIG0MzKEfkI"
  type="text/javascript"></script>
<?php

		// $addressFrom, $addressTo, $unit = ''
		$addressFrom="Ahmadabad";
		$addressTo="Anand";
		$unit ='';
	    // Google API key
	    $apiKey = 'AIzaSyDj1Rs87JgSp5oK3bfK6vI-eIG0MzKEfkI';
	    
	    // Change address format
	    $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
	    $formattedAddrTo     = str_replace(' ', '+', $addressTo);
	    
	    // Geocoding API request with start address
	    echo $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
	    $outputFrom = json_decode($geocodeFrom);
	    if(!empty($outputFrom->error_message)){
	        return $outputFrom->error_message;
	    }
	    
	    // Geocoding API request with end address
	    $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
	    $outputTo = json_decode($geocodeTo);
	    if(!empty($outputTo->error_message)){
	        return $outputTo->error_message;
	    }
	    
	    // Get latitude and longitude from the geodata
	    $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
	    $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
	    $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
	    $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
	    
	    // Calculate distance between latitude and longitude
	    $theta    = $longitudeFrom - $longitudeTo;
	    $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
	    $dist    = acos($dist);
	    $dist    = rad2deg($dist);
	   echo  $miles    = $dist * 60 * 1.1515;
	    die;
	    // Convert unit and return distance
	    $unit = strtoupper($unit);
	    if($unit == "K"){
	        return round($miles * 1.609344, 2).' km';
	    }elseif($unit == "M"){
	        echo round($miles * 1609.344, 2).' meters';
	        die;
	    }else{
	        echo  round($miles, 2).' miles';
	        die;
	    }
	
	
	
		

	 $this->load->view('common/footer');
?>
