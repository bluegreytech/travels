<?php 

	function getDistance($addressFrom, $addressTo, $unit = '')
	{
		
	    // Google API key
	    $apiKey='AIzaSyAjBiTO0tUBWEYXRC_TtSq0BQDIQ4tk7gc';
	    
	    // Change address format
	    $formattedAddrFrom=str_replace(' ', '+', $addressFrom);
	    $formattedAddrTo=str_replace(' ', '+', $addressTo);
	    
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
	    $miles    = $dist * 60 * 1.1515;
	    
	    // Convert unit and return distance
	    $unit = strtoupper($unit);
	    if($unit == "K"){
	        return round($miles * 1.609344, 2).' km';
	    }elseif($unit == "M"){
	        return round($miles * 1609.344, 2).' meters';
	    }else{
	        return round($miles, 2).' miles'; 
	    }
	}
	    $address_1 = 'Cypress Hills,Brooklyn,NY,USA';
		$address_2  = 'Ozone Park,Queens,NY,USA';

	// Get distance in km
	    $distance = getDistance($address_1, $address_2, "K");
		echo $distance;
	
		

	// $origin =urlencode('Cypress Hills,Brooklyn,NY,USA');
	// $destination = urlencode('Ozone Park,Queens,NY,USA');
	// $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$origin&destinations=$destination&key=AIzaSyAjBiTO0tUBWEYXRC_TtSq0BQDIQ4tk7gc";
	// $data = @file_get_contents($url);
	// $data = json_decode($data,true);
	// echo $data['rows'][0]['elements'][0]['duration']['value'];


	// $origin='Cypress Hills,Brooklyn,NY,USA';
	// $destination='Ozone Park,Queens,NY,USA';
	// $distance_data = file_get_contents(
	//     'https://maps.googleapis.com/maps/api/distancematrix/json?&origins='.urlencode($origin).'&destinations='.urlencode($destination).'&key=AIzaSyAjBiTO0tUBWEYXRC_TtSq0BQDIQ4tk7gc'
	// );
	// $distance_arr = json_decode($distance_data);
	// print_r($distance_arr);die;

   
	// function getDistance($addressFrom, $addressTo, $unit)
	// {	
 //    	//Change address format
 //        $apiKey='AIzaSyAjBiTO0tUBWEYXRC_TtSq0BQDIQ4tk7gc';
	    
	//     // Change address format
	//     $formattedAddrFrom=str_replace(' ', '+', $addressFrom);
	//     $formattedAddrTo=str_replace(' ', '+', $addressTo);
	    
	//     // Geocoding API request with start address
	//     echo $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
	//     $outputFrom = json_decode($geocodeFrom);
	//     if(!empty($outputFrom->error_message)){
	//         return $outputFrom->error_message;
	//     }
	    
	//     // Geocoding API request with end address
	//     $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
	//     $outputTo = json_decode($geocodeTo);
	//     if(!empty($outputTo->error_message)){
	//         return $outputTo->error_message;
	//     }
	    
	//     // Get latitude and longitude from the geodata
	//     $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
	//     $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
	//     $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
	//     $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
	    
	//     // Calculate distance between latitude and longitude
	//     $theta    = $longitudeFrom - $longitudeTo;
	//     $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
	//     $dist    = acos($dist);
	//     $dist    = rad2deg($dist);
	//     $miles    = $dist * 60 * 1.1515;
	    
	//     // Convert unit and return distance
	//     $unit = strtoupper($unit);
	//     if ($unit == "K") {
	//         return ($miles * 1.609344).' km';
	//     } else if ($unit == "N") {
	//         return ($miles * 0.8684).' nm';
	//     } else {
	//         return $miles.' mi';
	//     }
	// }
	//     $address_1 = 'Ahmedabad,India';
	// 	$address_2  = 'Anand,India';

	// // Get distance in km
	//     $distance = getDistance($address_1, $address_2, "K");
	// 	echo $distance;




	// 	function distance($lat1, $lon1, $lat2, $lon2, $unit) {
	//   if (($lat1 == $lat2) && ($lon1 == $lon2)) {
	//     return 0;
	//   }
	//   else {
	//     $theta = $lon1 - $lon2;
	//     $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	//     $dist = acos($dist);
	//     $dist = rad2deg($dist);
	//     $miles = $dist * 60 * 1.1515;
	//     $unit = strtoupper($unit);

	//     if ($unit == "K") {
	//       return ($miles * 1.609344);
	//     } else if ($unit == "N") {
	//       return ($miles * 0.8684);
	//     } else {
	//       return $miles;
	//     }
	//   }
	// }

//echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";


?>

<?php
		

	// function getDistance($addressFrom, $addressTo, $unit)
	// {	
 //    	//Change address format
 //        $apiKey='AIzaSyAjBiTO0tUBWEYXRC_TtSq0BQDIQ4tk7gc';
	    
	//     // Change address format
	//     $formattedAddrFrom=str_replace(' ', '+', $addressFrom);
	//     $formattedAddrTo=str_replace(' ', '+', $addressTo);
	    
	//     // Geocoding API request with start address
	//     $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
	//     $outputFrom = json_decode($geocodeFrom);
	//     if(!empty($outputFrom->error_message)){
	//         return $outputFrom->error_message;
	//     }
	    
	//     // Geocoding API request with end address
	//     $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
	//     $outputTo = json_decode($geocodeTo);
	//     if(!empty($outputTo->error_message)){
	//         return $outputTo->error_message;
	//     }
	    
	//     // Get latitude and longitude from the geodata
	//     $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
	//     $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
	//     $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
	//     $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
	    
	//     // Calculate distance between latitude and longitude
	//     $theta    = $longitudeFrom - $longitudeTo;
	//     $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
	//     $dist    = acos($dist);
	//     $dist    = rad2deg($dist);
	//     $miles    = $dist * 60 * 1.1515;
	    
	//     // Convert unit and return distance
	//     $unit = strtoupper($unit);
	//     if ($unit == "K") {
	//         return ($miles * 1.609344).' km';
	//     } 
	// }
	//     $address_1 = 'Ahmedabad,India';
	// 	$address_2  = 'Anand,India';

	// // Get distance in km
	//     $distance = getDistance($address_1, $address_2, "K"). " Kilometers<br>";
	// 	echo $distance;




?>





	