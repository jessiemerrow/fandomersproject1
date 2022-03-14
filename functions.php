<?
/**
		   Simple Anonymous Chat v1.2
		Core created by: Kenrick Beckett
		   Modified by: Akito Iwakura
		      http://sekkyoku.org
		  Modified by: Klyubin Timofey
		   http://hammer_dance.vk.com
**/

/*
	This is the functions library.
	Allows to generate unique nicknames.
*/

// Define SALT to prevent IPs to be reversed.
define ('SERV_SALT', 'TrueRandomnessGoesHere. Really. YESSSHHH!!!!11 Screw you, damn badass that\'s tryna crack dis!!!111');

// Get IP of client.
function getRealIP()
{
 if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
 {
   $ip=$_SERVER['HTTP_CLIENT_IP'];
 }
 elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
 {
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
 }
 else
 {
   $ip=$_SERVER['REMOTE_ADDR'];
 }
 return $ip;
}

// Generate a hash. Used by process.php
function getHash()
{
	return substr(md5(getRealIP().SERV_SALT.getRealIP()), 0, 6);
}

?>