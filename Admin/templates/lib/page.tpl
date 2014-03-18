{literal}
<script language="javascript" type="text/javascript">
function spanHighlight(id)
{
  document.getElementById(id).style.background="#CCCCCC";
}

function spanNormal(id,page)
{
  if(id==page) 
  {
    document.getElementById(id).style.background="#CCCCCC";
  }
  else
  {
    document.getElementById(id).style.background="#FFFFFF";
  }
}

</script>
{/literal}

<table width="40%" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td align="center" width="5%">
		{if $arr_page_vars.page_link_start neq 1}
		 <a href="{$page_name}{if $page_args neq ''}{$page_args}&page={$arr_page_vars.page_link_start-10}{else}?page={$arr_page_vars.page_link_start-10}{/if}" style="cursor:pointer;">
		 <img src="images/reverse.png" border="0" /></a>
		{else}
		 <img src="images/reverse_disable.png" border="0" style="cursor:text;" />		
		{/if}
		</td>
		
		<td align="center" width="5%">
		{if $curr_page gt 1}
		  <a href="{$page_name}{if $page_args neq ''}{$page_args}&page={$curr_page-1}{else}?page={$curr_page-1}{/if}" style="cursor:pointer;"><img src="images/previous.png" border="0" /></a>
		{else}		
		   <img src="images/previous_disable.png" border="0" style="cursor:text;" />		
		{/if}		
		</td>
		
		<td align="center" valign="middle" style="padding:2px 2px 2px 2px;">
		 {foreach from=$links item=links}		 
		    <a href="{$page_name}{if $page_args neq ''}{$page_args}&page={$links}{else}?page={$links}{/if}" style="text-decoration:none; color:#000000;">  
			  <span id="{$links}" style="border:1px solid #666666; padding-left:6px; padding-right:6px; {if $curr_page eq $links} background:#CCCCCC;{/if} cursor:pointer;" onmouseover="spanHighlight(this.id);" onmouseout="spanNormal(this.id,{$curr_page});">		    
			  {$links}	
		  	  </span>
			</a>  
		 {/foreach}
		</td>
		
		<td align="center" width="5%"> 
		{if $curr_page lt $arr_page_vars.no_of_pages}
		  <a href="{$page_name}{if $page_args neq ''}{$page_args}&page={$curr_page+1}{else}?page={$curr_page+1}{/if}" style="cursor:pointer;"><img src="images/next.png" title="Next" border="0"  /></a>
		{else}		
		  <img src="images/next_disable.png" border="0" style="cursor:text;" />
		{/if}
		</td>
		
		<td align="center" width="5%">
		{if $links lt $arr_page_vars.no_of_pages}
		  <a href="{$page_name}{if $page_args neq ''}{$page_args}&page={$links+1}{else}?page={$links+1}{/if}" style="cursor:pointer;"> <img src="images/forward.png" title="Fast Next" border="0" /></a>
		{else}
		  <img src="images/forward_disable.png" border="0" style="cursor:text;" />
		{/if}
		</td>
	</tr>
</table>