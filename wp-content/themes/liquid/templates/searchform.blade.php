<form role="search" method="get" class="search-form form-inline" action="<?= esc_url(home_url('/')); ?>">
  <label class="sr-only"><?php _e('Search for:', 'sage'); ?></label>
  <div class="input-group">
	  <input type="search" value="<?= get_search_query(); ?>" name="s" class="input-group-field" placeholder="<?php _e('Search', 'sage'); ?> <?php bloginfo('name'); ?>" required>
	  <div class="input-group-button">
	    <input type="submit" class="button" value="Search">
	  </div>
	</div>
</form>