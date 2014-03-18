var xmlHttp
function setOrder(textid,datavalue,dataid,table_name,field_id,primary_id)
{ 
	order_number = document.getElementById(textid).value;
	
	if(order_number != "")
	{
		xmlHttp = GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		xmlHttp.open("GET","ajax.php?order_number="+order_number+"&dataid="+dataid+"&datavalue="+datavalue+"&table_name="+table_name+"&field_id="+field_id+"&primary_id="+primary_id,true) 
		 
		xmlHttp.onreadystatechange=stateChanged 
		
		xmlHttp.send(null)
	}
}

function stateChanged() 
{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 
		var ans = xmlHttp.responseText
	} 
}

function GetXmlHttpObject()
{
	var xmlHttp=null;
	try
	{
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e)
	{
		//Internet Explorer
		try
		{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}