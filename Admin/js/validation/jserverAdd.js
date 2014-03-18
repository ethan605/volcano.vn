window.onload=function()
{
   $('submit').onclick = function() { 
      
	  var er = chkValidSubmit(); 		  
		  		  
	  if(er)
	  {
		 //document.standardform.submit();			 
	  }
	  else		     
		 return false; 		
   };	
}

function chkValidSubmit() 
{
	if ($F('server_link').length < 1)
	{
		alert("Please Enter Server Link");
		$('server_link').focus();
		return false;
	}
	
	if ($F('radio_no').length < 1)
	{
		alert("Please Enter Radio No");
		$('radio_no').focus();
		return false;
	}
	
	if ($F('radio_station_email').length < 1)
	{
		alert("Please Enter Email");
		$('radio_station_email').focus();
		return false;
	}

	return true;
}