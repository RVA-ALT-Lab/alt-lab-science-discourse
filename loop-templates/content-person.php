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
		<img src="<?php echo get_field('profile_image')['sizes']['person-profile'];?>" alt="Profile image for <?php the_title();?>">
	    <?php the_title( '<h2 class="person-name">', '</h2>' ); ?>
	    <div class="person-title"><?php the_field('title');?></div>
	    <div class="contact">
	    	<?php echo sci_dis_email();?>
	    </div>
     </div>
</div>           