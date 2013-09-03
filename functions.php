<?php
	/**
	 * engage functions and definitions v1
	 *
	 */


/*   ====================================================================================================================
	
	UTILITIES
	 
=========================================================================================================================
*/

	
// dequeue responsive css

	function engage_remove_scripts() {
		wp_dequeue_style( 'responsive' );
		wp_deregister_style( 'responsive' );
		
		// Now register your styles and scripts here
	}
	add_action( 'wp_enqueue_scripts', 'engage_remove_scripts', 20 );


//excerpts in pages
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}



// changing default wordpres email settings 
 
		add_filter('wp_mail_from', 'new_mail_from');
		add_filter('wp_mail_from_name', 'new_mail_from_name');
		 
		function new_mail_from($old) {
			 return 'tom@toms-kitchen.com';
		}
		
		function new_mail_from_name($old) {
			 return 'Tom\'s Kitchen';
		}    
    


// Admin notifications for Menus

function engage_menus_admin_notices() {
    global $pagenow;

    $is_edit_custom_post_type = ( 'post.php ' == $pagenow && 'menus' == get_post_type( $_GET['post'] ) );
    $is_new_custom_post_type = ( 'post-new.php' == $pagenow && 'menus' == $_GET['post_type'] );
    $is_all_post_type = ( 'edit.php' == $pagenow && 'menus' == $_GET['post_type'] );

    if ( $is_all_post_type || $is_edit_custom_post_type || $is_new_custom_post_type ) {
        echo '
        <div class="updated">
     <p>Add a <strong>category</strong> to your menu and select an <strong>occasion</strong> to connect it to. A menu can be tagged for more than one occasion.</p>   
     </div>';
    }
}

add_action( 'admin_notices', 'engage_menus_admin_notices' );




/*   ====================================================================================================================
	
	IMAGES
	 
=========================================================================================================================
*/


	//below fixed spans with 10px padding left and right
	
  /* add_image_size( 'small-thumb', 200, 132, true );
	add_image_size( 'medium-thumb', 280, 180, true );
	add_image_size( 'small-main', 600, 340, true );
	add_image_size( 'medium-main', 680, 420, true );
	add_image_size( 'full-main', 940, 420, true );
	add_image_size( 'half-main', 440, 276, true ); 	*/


 	//Fixed span with no padding

	add_image_size( 'small-thumb', 220, 162, true );
	add_image_size( 'medium-thumb', 300, 180, true );
	add_image_size( 'small-main', 620, 340, true );
	add_image_size( 'medium-main', 700, 300, true );
	add_image_size( 'full-main', 940, 420, true );
	add_image_size( 'half-main', 460, 276, true );	



/*   ====================================================================================================================
	
	SIDEBARS
	 
=========================================================================================================================
*/

// http://codex.wordpress.org/Function_Reference/register_sidebar

function engage_register_sidebars() {
  $sidebars = array( 'Page', 'News', 'Search');

  foreach($sidebars as $sidebar) {
    register_sidebar(
      array(
        'id'            => 'engage-' . sanitize_title($sidebar),
        'name'          => __($sidebar, 'engage'),
        'description'   => __($sidebar, 'engage'),
        'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="widget-inner">',
        'after_widget'  => '</div></article>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
      )
    );
  }
}

add_action('widgets_init', 'engage_register_sidebars');

/*   ====================================================================================================================
	
	Shortcodes
	 
=========================================================================================================================
*/



function feature_short ($atts){

extract(shortcode_atts(array(
      'page_id' => 1
   ), $atts));
   
 
$page_data = get_page( $page_id ); 

$image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_data->ID ), 'small-thumb' );
$text='';
$text .= '<img src="' . $image[0] . '">';
$text .= '<h3>'. $page_data->post_title .'</h3>';
$text .= apply_filters('the_excerpt' , $page_data->post_excerpt);

$text .= '<img src="' . $image[0] . '">'
	.'<h3>'. $page_data->post_title .'</h3>'
	.apply_filters('the_excerpt' , $page_data->post_excerpt)
;

return $text;

}

add_shortcode('feature', 'feature_short');




