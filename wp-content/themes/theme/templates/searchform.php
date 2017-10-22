<div class="bbi-search-wrap">   
	<form id="bbi-search-form" method="get" class="search-form form-inline" action="<?= esc_url(home_url('/')); ?>">
	  <div class="search-cont">
	    <input type="search" aria-label="Search" value="<?= get_search_query(); ?>" name="s" class="search-field form-control" placeholder="<?php _e('Search', 'sage'); ?>" required>
	    <!-- <span class="input-group-btn"> -->
	      <button type="submit" aria-label="Submit" class="search-submit"><i class="fa fa-search"></i></button>
	    <!-- </span> -->
	  </div>
	</form>
</div>