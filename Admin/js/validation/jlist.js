function callFunction(selected_action_id)
{
	var action_value = document.getElementById(selected_action_id).value;
	if(action_value == "active")
	{
		checkActive();
	}
	else if(action_value == "inactive")
	{
		checkInActive();
	}
	else if(action_value == "delete")
	{
		checkDelete();
	}
	else if(action_value == "showall")
	{
		showAll();
	}
	else
	{
		alert("Choose an action");
		return false;
	}
}

function valid()
{	
	if(document.frmlist.keyword.value.length < 1)
	{
		alert("Please Enter keyword for Search.");
		document.frmlist.keyword.focus();
		return false;
	}
	document.frmlist.action.value="Search";
}
function checkAll()
{
	var rs = (document.frmlist.abc.checked)?true:false;
	
	for(i=0;i<document.frmlist.elements.length;i++)
	{
	  	if(document.frmlist.elements[i].id == 'iId')
  		{
			document.frmlist.elements[i].checked = rs;
		}

	}  
}

function showAll()
{
  document.frmlist.action.value="showAll";	
  document.frmlist.submit();
}


function checkDelete()
{
	var y=0; var ans;
	y = getCheckCount();

	if(y>0)
	{
		ans = confirm("Confirm Deletion of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.action.value="Delete";
		    document.frmlist.submit();
		}
		else
		{return false;}
	}
	else
	{	alert("Please Select a Record(s) to Delete.");	return false;	}
}

function getCheckCount()
{	var x=0;

	for(i=0;i < document.frmlist.elements.length;i++)
	{	if (document.frmlist.elements[i].id == 'iId' && document.frmlist.elements[i].checked == true) 
			{x++;}
	}
	return x;
}

function checkActive()
{
	var y=0; var ans;
	y = getCheckCount();
	if(y>0)
	{	ans = confirm("Confrim Active Status of Selected Record(s) ?");
		if(ans == true)
		{	
		
			document.frmlist.action.value="Active";	
			document.frmlist.submit();		}
		else
		{	
		return false;
		}
	}
	else
	{	alert("Please Select a Record(s) to Activate.");	return false;	}
}

function checkPending()
{
	var y=0; var ans;
	y = getCheckCount();
	if(y>0)
	{	ans = confirm("Confrim Pending Status of Selected Record(s) ?");
		if(ans == true)
		{	
		document.frmlist.action.value="Pending";	
		document.frmlist.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) for Pending.");	return false;	}
}

function checkInActive()
{
	var y=0; var ans;
	y = getCheckCount();
	
	if(y>0)
	{	ans = confirm("Confrim Inactive Status of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.action.value="Inactive";	
			document.frmlist.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to Deactivate.");	return false;	}
}

function checkApproved()
{
	var y=0; var ans;
	y = getCheckCount();
	
	if(y>0)
	{	ans = confirm("Confrim Approved Status of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.action.value="approved";	
			document.frmlist.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to make Approved.");	return false;	}
}

function checkDone()
{
	var y=0; var ans;
	y = getCheckCount();
	
	if(y>0)
	{	ans = confirm("Confrim Done Status of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.action.value="Done";	
			document.frmlist.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to make Done.");	return false;	}
}

function checkInProcess()
{
	var y=0; var ans;
	y = getCheckCount();
	
	if(y>0)
	{	ans = confirm("Confrim InProcess Status of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.action.value="inprocess";	
			document.frmlist.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to make Inprocess.");	return false;	}

}
function checkDelivered()
{
	var y=0; var ans;
	y = getCheckCount();
	
	if(y>0)
	{	
		ans = confirm("Confrim Delivered Status of Selected Record(s) ?");
		if(ans == true)
		{	
			document.frmlist.action.value="delivered";	
			document.frmlist.submit();		
		}
		else
		{	
			return false;	
		}
	}
	else
	{	
		alert("Please Select a Record(s) to make Delivered.");	return false;	
	}
}
function checkCancelled()
{
	var y=0; var ans;
	y = getCheckCount();
	
	if(y>0)
	{	ans = confirm("Confrim Cancelled Status of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.action.value="cancelled";	
			document.frmlist.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to make Cancelled.");	return false;	}
}
function sendMails()
{
	var y=0; var ans;
	y = getCheckCount();
	
	if(y>0)
	{	ans = confirm("Confrim send mail to Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.action.value="sendmail";	
			document.frmlist.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to send mail.");	return false;	}
}

function checkDelete1()
{
	var y=0; var ans;
	y = getCheckCount();
	
	if(y>0)
	{	ans = confirm("Confirm Deletion of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.action.value="Delete";
		    document.frmlist.submit();}
		else
		{return false;}
	}
	else
	{	alert("Please Select a Record(s) to Delete.");	return false;	}
}

function delete1()
{
	var y=0; var ans;
	y = getCheckCount();
	
	if(y>0)
	{	ans = confirm("Confirm Deletion of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.action.value="Delete";
		    document.frmlist.submit();}
		else
		{return false;}
	}
	else
	{	alert("Please Select a Record(s) to Delete.");	return false;	}
}



