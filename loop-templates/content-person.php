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
	<div class="single-person">
		<img src="<?php echo sci_dis_profile_image();?>" alt="Profile image for <?php the_title();?>" class="single-profile-img">
	    <?php the_title( '<h2 class="person-name">', '</h2>' ); ?>
	    <div class="person-title"><?php the_field('title');?></div>
	    <div class="contact">
	    	<?php echo sci_dis_email();?>
	    	<?php echo sci_dis_phone();?>
	    </div>
	    <?php echo sci_dis_group();?>
     </div>
</div>           