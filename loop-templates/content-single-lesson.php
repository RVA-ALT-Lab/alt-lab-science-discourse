<?php
/**
 * Single post lesson partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<div class="row">
			<div class="col-md-6 no-pad">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<div class="header-focus">
					
					<div class="header-materials header-box">
						<div class="big-number"><?php 
						if (get_post_meta( get_the_ID(), 'total_resource_count', true ) === 1 ){
							$materials_label = 'Material';
						} else {
							$materials_label = 'Materials';
						}
						echo ee_materials_count();?></div>
						<div class="header-label"><?php echo $materials_label;?> Needed</div>
					</div>
					<div class="header-time header-box">
						<div class="big-number"><?php echo get_post_meta( get_the_ID(), 'total_time_count', true );?></div>
						<div class="header-label">Minutes Required</div>
					</div>
					<div class="theme-box">
						<?php ee_subject_theme_list('science_themes', 'Science');?>
							
						<?php ee_subject_theme_list('math_themes', 'Math');?>
										
						<?php ee_subject_theme_list('engineering_themes', 'Engineering');?>
						
						<?php ee_subject_theme_list('comp_sci_themes', 'Computer Science');?>
					</div>
					<div class="sols col-md-12">
						<div class="holder">
							<h2>SOL</h2>
							<?php ee_subject_theme_list('sols', '');?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php 
				$thumbnail_id = get_post_thumbnail_id( $post->ID );
				if (get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true)){
					$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);   
				} else {
					$alt = 'A thumbnail image for this lesson.';
				}

				echo get_the_post_thumbnail( $post->ID, 'eng-size', array('class' => 'lesson-thumb', 'alt' => $alt) ); ?>
			</div>
		</div>

	</header><!-- .entry-header -->


	<div class="entry-content row">

		<?php //the_content(); ?>
		<!-- DESCRIPTION -->
		<div class="description col-md-12">
			<div class="holder">
				<h2>Description</h2>
				<?php the_field('description');?>
			</div>
		</div>
		<!-- END DESCRIPTION -->
		<!-- MATERIAL -->
		<div class="material col-md-6">
			<div class="holder">	
				<h2>Materials</h2>
				<?php if( have_rows('materials') ): ?>
						<ul>
							<?php while( have_rows('materials') ): the_row();
								$item = get_sub_field('item');	
								echo '<li>' . $item . '</li>'			
							?> 
						<?php endwhile; ?>
						</ul>
				<?php else: ?>
				<p>No materials needed.</p>	
					<?php endif; ?>			

			</div>
		</div>
		<!-- END MATERIAL -->
		<!-- TIME -->
		<div class="time col-md-6">
			<div class="holder">
				<?php if( have_rows('time_needed') ): ?>
					<?php 
						$html = '';
						while( have_rows('time_needed') ): the_row();
							$name = get_sub_field('lesson_portion');	
							$time = get_sub_field('time');	
							$html .= ee_time_list($name, $time);									
					?>						
					<?php endwhile; ?>
						<h2>Time</h2>
						<h3 class="total-time">Total time: <?php echo get_post_meta( get_the_ID(), 'total_time_count', true );?> Minutes</h3>
						<ul>
							<?php echo $html;?>
						</ul>
					<?php endif; ?>		
			</div>
		</div>
		<!--END TIME-->		
		<!-- ALTERNATIVES -->		
		
		<?php if( get_field('alternatives') ): ?>
			<div class="alts col-md-12">
				<div class="holder">
					<h2>Alternatives or Extensions</h2>
					<?php the_field('alternatives');?>
				</div>
			</div>
		<?php endif; ?>		
			
		<!-- END ALTERNATIVES -->				
		<!-- REFLECTION -->		
		
		<?php if( get_field('reflection') ): ?>
			<div class="reflection col-md-12">
				<div class="holder">
					<h2>Reflection Suggestions</h2>
					<?php the_field('reflection');?>
				</div>
			</div>
		<?php endif; ?>							
		
		<!-- END REFLECTION -->	
		<!-- RESOURCES -->

		<?php if( have_rows('resources_and_references') ): ?>
			<div class="resources col-md-12">
				<div class="holder">
				<h2>Helpful Links</h2>
				<ul>						
				<?php 
					$html = '';
					while( have_rows('resources_and_references') ): the_row();
						$title = get_sub_field('resource_title');	
						$link = get_sub_field('resource_link');	
						$description = get_sub_field('resource_description');	
						$html .= '<li>';
						if ($link){ 
							$html .= '<a href="' . $link . '" target="_blank" >';
							} 
						$html .= $title;
						if($link){
							$html .= '</a>';
							}
						if($description) { 
							$html .= ' - ' . $description;
							};		
				?>				
				<?php endwhile; ?>
				<?php echo $html;?>					
					</ul>
				</div>
			</div>
		<?php endif; ?>		
			
		<!--END RESOURCES-->		

		<!-- GDRIVE -->							
		<div class="google-folder col-md-12">
			<div class="holder">				
				<?php 
				if(get_field('google_folder_link')){
					echo '<h2>Resources</h2>';
					$url = get_field('google_folder_link');
					$google_id = explode("/",$url)[5];
					$clean_id = explode("?", $google_id)[0];
					echo '<iframe src="https://drive.google.com/embeddedfolderview?id=' . $clean_id . '#list" width="100%" height="300" frameborder="0"></iframe>';
				}
				?>	
				</div>					
		</div>
		<!-- END GDRIVE -->							
		<!-- PHOTOS -->	
		<div class="photos row">
				<?php $photos = get_field('images');
					//echo '<li class="li-focus">Focus: </li>';
				    if ($photos){
				    	$count = count(get_field('images'));
				    	foreach ($photos as $photo) {
				    		 //print("<pre>".print_r($photo,true)."</pre>");
							echo '<div class="'. ee_image_div($count) .'"><img src="' . $photo["image"]["sizes"]["eng-size"] . '" class="img-fluid"></div>';
						}
				    }
					
				?>
		</div>
		<!-- END PHOTOS -->							
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
