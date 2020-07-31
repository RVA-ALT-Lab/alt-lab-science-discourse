<?php
/**
 * Partial template for research
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div class="col-md-8 offset-md-2">
	<div class="single-research">
	    <?php the_sub_field('publication_text');?>
	    <a href="<?php the_sub_field('publication_url')?>"><?php the_sub_field('publication_url')?></a>
	   
	</div>
</div>
          