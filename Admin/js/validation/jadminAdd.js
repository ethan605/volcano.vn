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
	
	if ($F('name').length < 1)
	{
		alert("Please Enter Name");
		$('name').focus();
		return false;
	}
	
	if ($F('username').length < 1)
	{
		alert("Please Enter Username");
		$('username').focus();
		return false;
	}
	
	if ($F('password').length < 1)
	{
		alert("Please Enter Password");
		$('password').focus();
		return false;
	}
	
	if ($F('country').length < 1)
	{
		alert("Please Enter Country");
		$('country').focus();
		return false;
	}
	return true;
}