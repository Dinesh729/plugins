<?php

require 'facebook.php';

$facebook = new Facebook(array(
	'appId' => '1612870002281473',
	'secret' => 'cf2cdacb7838167bafda99d671c613df'
));

if($facebook->getUser() == 0){
	$loginUrl = $facebook->getLoginUrl();
	echo "<a href = '$loginUrl'>";
	echo "<img src='../png/fb_login.jpeg'>";
	echo "</a>";
}
else{
	
	$api = $facebook->api('me');
	echo "Hi " . $api[name];
	
	//echo "<br><a href ='logout_fb.php'>Logout</a>";
	
}

?>