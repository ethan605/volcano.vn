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
	if ($F('title').length < 1)
	{
		alert("Please Enter Title");
		$('title').focus();
		return false;
	}
	
	if ($F('desc').length < 1)
	{
		alert("Please Enter Description");
		$('desc').focus();
		return false;
	}
	
	if ($F('dt').length < 1)
	{
		alert("Please Enter Date");
		$('dt').focus();
		return false;
	}
	
	return true;
}