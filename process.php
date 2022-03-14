<?php
/**
		   Simple Anonymous Chat v1.2
		Core created by: Kenrick Beckett
		   Modified by: Akito Iwakura
		       http://sekkyoku.org
		  Modified by: Klyubin Timofey
		   http://hammer_dance.vk.com
**/

/*
	This is the Chat Processing module.
	This script is the server side of your chat.
*/

// Functions to generate unique nickname
include ('./functions.php');

$function = $_POST['function'];

$log = array();

switch($function) {

	 case('getState'):
		 if(file_exists('chat.txt'))
		 {
		   $lines = file('chat.txt');
		 }
		 $log['state'] = count($lines); 
		 break;	
		 
////////////////////////////////

	 case('update'):
		$state = $_POST['state'];
		if(file_exists('chat.txt')){
		   $lines = file('chat.txt');
		 }
		 $count =  count($lines);
		 if($state == $count){
			 $log['state'] = $state;
			 $log['text'] = false;
			 
			 }
			 else{
				 $text= array();
				 $log['state'] = $state + count($lines) - $state;
				 foreach ($lines as $line_num => $line)
				   {
					   if($line_num >= $state){
					 $text[] =  $line = str_replace("\n", "", $line);
					   }
	 
					}
				 $log['text'] = $text; 
			 }
		  
		 break;
		 
//////////////////////////////////////////////	
 
	 case('send'):
		// Generate a hash-nickname for the user.
		$nickname = getHash();
		$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,}(\/\S*)?/";
		$message = htmlspecialchars(strip_tags($_POST['message']));
		

		if(($message) != "\n"){
			// Prepare URLs...
			if(preg_match($reg_exUrl, $message, $url))
			{
				$message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
			} 

		 // Write log.
		 fwrite(fopen('chat.txt', 'a'), "<div class=\"nick\" onclick=\"mesgTo('".$nickname."');\" style=\"color:#".$nickname.";\">". $nickname . "</div>  &rarr; <div class=\"mesg\">" . $message = str_replace("\n", " ", $message) . "</div><br>\n"); 
	 }
		 break;
	
}

// Give result to client
echo json_encode($log);

?>