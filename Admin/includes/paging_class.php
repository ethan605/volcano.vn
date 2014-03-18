<?php
    function page_variables($query,$page_size,$curr_page)
	{
	   $exec_query = mysql_query($query) or die($query);
	   $total = mysql_num_rows($exec_query);	   
	   	   
	   $no_of_pages = (int)($total/$page_size);	   	   	   
	   $mod_pages = $total % $page_size;
	   if($mod_pages>0)
	      $no_of_pages += 1;
	   
	   $prev_link = "1";	
	   $next_link = "1";	
	   
	   if($curr_page == 1)
	   	  $prev_link = "0";	
	   
	   if($curr_page >= $no_of_pages)	  	   
	      $next_link = "0";	
	   
	   $page_links = $curr_page%10;
	   if($page_links!=0)
	      $page_link_start = (int)($curr_page/10) + 1;	
	   else
	      $page_link_start = (int)($curr_page/10);	
	    	
	   $page_link_start = ($page_link_start*10) - 10 + 1;
	    	  	    	  
	   $arr_page_vars = array('total'=>$total,'no_of_pages'=>$no_of_pages,'page_link_start'=>$page_link_start,'prev_link'=>$prev_link,'next_link'=>$next_link);
	   
	   return $arr_page_vars;			  
	}	
?>