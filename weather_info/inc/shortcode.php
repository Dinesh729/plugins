<?php
	add_action('init', 'today_weather');
	function today_weather(){
		add_shortcode('weather_status', 'weather_info');
	}
	


	
function weather_info($args, $content){
 	$data = file_get_contents('http://api.worldweatheronline.com/free/v2/weather.ashx?key=50cc33c701db7b4ee6f86f37ff01b&q=112.196.33.85&num_of_days=1&tp=3&format=json');
   $data1= json_decode( $data, true );  
   $content1 = '.
	<div>
		<ul class="outlook_div" id="outlook_div_wxs">
			 <li class="outlook_box1">
			 	<img src="'.$data1['data']['current_condition'][0]['weatherIconUrl'][0]['value'].'" alt="'.$data1['data']['current_condition'][0]['weatherDesc'][0]['value'].'">'.$data1['data']['current_condition'][0]['temp_C'].'°c <br>
		  		<span>'.
					$data1['data']['current_condition'][0]['weatherDesc'][0]['value'].'
			    </span>
			</li>
  	   </ul>
  	   <div class="clear"></div>
   </div>';
  
 	return $content1;
}
 
?>