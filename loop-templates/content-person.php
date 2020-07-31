<?php
/**
 * Partial template for person
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="col-md-4">
	<div class="news-article">
	    <?php the_title( '<h2 class="person-name">', '</h2>' ); ?>
	    <div class="person-title"><?php the_field('title');?></div>
     </div>
</div>           