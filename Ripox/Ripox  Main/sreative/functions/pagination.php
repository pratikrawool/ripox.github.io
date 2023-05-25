<?php

/* decneo_pagination by Patrick */

function decneo_pagination($start_end_links = 5, $middle_links = 5)
{
	global $wp_query;		
	// No decneo_pagination on pages
	if(!is_single())	
	{			
		$current = get_query_var('paged') == 0 ? 1 : get_query_var('paged');	// Current page read
		$total = $wp_query->max_num_pages;										// Total number of pages
		$links_left = floor(($middle_links - 1) / 2);							// Number of links at the top
		$links_right = ceil(($middle_links - 1) / 2);							// Number of links at the bottom
		// decneo_pagination issue only if more than one index page is
		if($total > 1)	
		{				
			// decneo_pagination initial
			echo '<div class="pagi"><ul>'; 
			// all go through "pages"
			for($i=1; $i<=$total; $i++)	
			{
				// Link to the current page
				if($i == $current)
				{
					echo '<li><a href="#" class="selected">'.($current).'</a></li>';
				}
				// all other page links
				elseif($i >= ($current - $links_left) && $i <= ($current + $links_right) || $i <= $start_end_links || $i > ($total - $start_end_links))
				{
					echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
				}
				// missed pages
				elseif($i == ($start_end_links + 1) && $i < ($current - $links_left + 1) || $i == ($total - $start_end_links) && $i > ($current + $links_right))
				{
					echo '...';
				}
			}
			// decneo_pagination End
			echo '</ul><div class="clear"></div></div>';
		}
	}
}
?>