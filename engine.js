/**
		   Simple Anonymous Chat v1.2
		Core created by: Kenrick Beckett
		   Modified by: Akito Iwakura
		      http://sekkyoku.org
		  Modified by: Klyubin Timofey
		   http://hammer_dance.vk.com
**/

/*
	This is the Engine of your chat.
	This file connects to back-end (process.php)
	and controls Interface of your chat.
*/

var chat =  new Chat();

function mesgTo(hash)
{
	var d = document.getElementById('sendie');
	d.value = "> "+hash+" "+d.value;
}

$(function() {

chat.getState(); 

$("#sendie").keydown(function(event)
{  
	var key = event.which;  
	if (key >= 33)
	{
		var maxLength = $(this).attr("maxlength");  
		var length = this.value.length;  
		if (length >= maxLength) 
		{  
		 event.preventDefault();  
		}  
	}  
});
	 $('#sendie').keyup(function(e) {	
						 
		  if (e.keyCode == 13) { 
		  
			var text = $(this).val();
			var maxLength = $(this).attr("maxlength");  
			var length = text.length; 
			 
			// send 
			if (length <= maxLength + 1) { 
			 
				chat.send(text, name);	
				$(this).val("");
				
			} else {
			
				$(this).val(text.substring(0, maxLength));
				
			}	
			
			
		  }
	 });
	
});