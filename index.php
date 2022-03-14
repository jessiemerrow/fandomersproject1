<!--

/**
		   Simple Anonymous Chat v1.2
		Core created by: Kenrick Beckett
		   Modified by: Akito Iwakura
		      http://sekkyoku.org
		  Modified by: Klyubin Timofey
		   http://hammer_dance.vk.com
**/


-->
<?php

/**
List of changes in v1.2 (06.01.2013):
 - Preparing URL's fixed (more than 3 character in top-level domain's name)
 - Simple antispam has added (if a message goes after the same message, the message becomes blocked)
 - The salt has updated :3
**/

/*
	This is the interface of your-chat (front-end).
*/

include('./functions.php');

// Generate a hash for current user
$hash = getHash();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Chat</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js?fuck_cache=yes"></script>
    <script type="text/javascript" src="engine.js">
    </script>
</head>
<body onload="setInterval('chat.update()', 5000)">
    <div id="page-wrap" class="page-wrap">
		<div id="chat-wrap" class="chatd">
			<div id="chat-area"></div>
		</div>
			
		<form id="send-message-area">
			<textarea id="sendie" maxlength="200" class="edit"></textarea>
		</form>
		
		<div class="info">
		<a href="logs.php">Old chat logs</a>
		<br>
			This is an anonymous chat.
			<br>
			There is no names, nicknames or IPs.
			<br>
			There is only special codes (hashes).
			<br>
			Your hash is <div style="color: #<?=$hash;?>; display:inline;"><?=$hash;?></div>.
		</div>
    </div>
</body>
</html>