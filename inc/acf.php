<?php
/**
 * ACF Functions and CPTs
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function total_time($id){   
    $total_time = 0;
    if (have_rows('time_needed',$id)){
        $needs = get_field('time_needed');
       foreach ($needs as $need ) {
            $time = intval($need["time"]);  
            $total_time = $total_time + $time;
       }
         return $total_time;
    }
}


function ee_materials_count(){
    $materials = get_post_meta( get_the_ID(), 'total_resource_count', true );
    if ($materials > 1){
        return $materials;
    } else {
        return 0;
    }
}

//update totals 

function ee_update_total_time( $post_id ) {
    $total = total_time($post_id);
    update_post_meta( $post_id, 'total_time_count', $total );

}

add_action( 'save_post', 'ee_update_total_time' );

function ee_update_total_resources( $post_id ) {
    $total = count(get_field('materials', $post_id));
    update_post_meta( $post_id, 'total_resource_count', $total );
}

add_action( 'save_post', 'ee_update_total_resources' );
    


//subject theme loops

function ee_subject_theme_list($acf_theme, $title){
    if(get_field($acf_theme)){
        $cats = get_field($acf_theme);
         echo '<ul>';
        if ($title != ''){
            echo '<li class="li-focus">'.$title.': </li>';
        }
        foreach ($cats as $cat) {
            $link = get_category_link($cat->term_id);
            echo '<li><a href="' . $link . '">' . $cat->name . '</a></li>';
        }
        echo '</ul>';
    }    
}


//ACF SAVE and LOAD JSON
add_filter('acf/settings/save_json', 'alt_ee_json_save_point');
 
function alt_ee_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    // return
    return $path;
    
}


add_filter('acf/settings/load_json', 'alt_ee_json_load_point');

function alt_ee_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    // append path
    $paths[] = get_stylesheet_directory()  . '/acf-json';
    
    
    // return
    return $paths;
    
}



//lesson custom post type

// Register Custom Post Type lesson
// Post Type Key: lesson

function create_lesson_cpt() {

  $labels = array(
    'name' => __( 'Lessons', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Lesson', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Lesson', 'textdomain' ),
    'name_admin_bar' => __( 'Lesson', 'textdomain' ),
    'archives' => __( 'Lesson Archives', 'textdomain' ),
    'attributes' => __( 'Lesson Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Lesson:', 'textdomain' ),
    'all_items' => __( 'All Lessons', 'textdomain' ),
    'add_new_item' => __( 'Add New Lesson', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Lesson', 'textdomain' ),
    'edit_item' => __( 'Edit Lesson', 'textdomain' ),
    'update_item' => __( 'Update Lesson', 'textdomain' ),
    'view_item' => __( 'View Lesson', 'textdomain' ),
    'view_items' => __( 'View Lessons', 'textdomain' ),
    'search_items' => __( 'Search Lessons', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into lesson', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this lesson', 'textdomain' ),
    'items_list' => __( 'Lesson list', 'textdomain' ),
    'items_list_navigation' => __( 'Lesson list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Lesson list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'lesson', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category','post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'lesson', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_lesson_cpt', 0 );


//person custom post type

// Register Custom Post Type person
// Post Type Key: person

function create_person_cpt() {

  $labels = array(
    'name' => __( 'Persons', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Person', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Person', 'textdomain' ),
    'name_admin_bar' => __( 'Person', 'textdomain' ),
    'archives' => __( 'Person Archives', 'textdomain' ),
    'attributes' => __( 'Person Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Person:', 'textdomain' ),
    'all_items' => __( 'All Persons', 'textdomain' ),
    'add_new_item' => __( 'Add New Person', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Person', 'textdomain' ),
    'edit_item' => __( 'Edit Person', 'textdomain' ),
    'update_item' => __( 'Update Person', 'textdomain' ),
    'view_item' => __( 'View Person', 'textdomain' ),
    'view_items' => __( 'View Persons', 'textdomain' ),
    'search_items' => __( 'Search Persons', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into person', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this person', 'textdomain' ),
    'items_list' => __( 'Person list', 'textdomain' ),
    'items_list_navigation' => __( 'Person list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Person list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'person', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'person', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_person_cpt', 0 );