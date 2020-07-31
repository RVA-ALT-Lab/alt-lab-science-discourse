<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/acf.php',                             // Load ACF functions.
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}


//News loop on the front page
function sci_dis_news(){
  $html = "";  
  $args = array(
      'posts_per_page' => 4,
      'post_type'   => 'post', 
      'post_status' => 'publish', 
      'category_name' => 'news',
      'nopaging' => false,
                    );
    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post();
                      $clean_title = sanitize_title(get_the_title());
                      $html .= '<div class="col-md-6"><div class="news-article">';
                      $html .= '<h2><a href="'.get_the_permalink().'">' . get_the_title() . '</a></h2>';
                      $html .= '<p>' . get_the_excerpt() . '</p>';
                      $html .= '</div></div>';                            
                                             
                       endwhile;
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().
   return '<div class="row news-wrapper">' . $html . '</div>';
}


function sci_dis_people(){
  $html = "";  
  $args = array(
      'posts_per_page' => 30,
      'post_type'   => 'person', 
      'post_status' => 'publish', 
      'nopaging' => false,
                    );
    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post();
                                        
                       get_template_part( 'loop-templates/content', 'person' );                 
                       endwhile;
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().
}

add_image_size( 'person-profile', 350, 350, array( 'center', 'center' ) ); 

function sci_dis_email(){
	global $post;
	if (get_field('email', $post->ID)){
		return '<div class="person-email">' . get_field('email', $post->ID) . '</div>';
	}
}

function sci_dis_research(){
	global $post;
	if( have_rows('publication_details', $post->ID) ):
	    // Loop through rows.
	    while( have_rows('publication_details', $post->ID) ) : the_row();
	    	get_template_part( 'loop-templates/content', 'research' );   
	        
	    // End loop.
	    endwhile;

	// No value.
	else :
	    // Do something...
	endif;
}

function sci_dis_presentations(){
	global $post;
	if( have_rows('presentation_details', $post->ID) ):
	    // Loop through rows.
	    while( have_rows('presentation_details', $post->ID) ) : the_row();
	    	get_template_part( 'loop-templates/content', 'presentation' );   
	        
	    // End loop.
	    endwhile;

	// No value.
	else :
	    // Do something...
	endif;

}

 //print("<pre>".print_r($a,true)."</pre>");}
