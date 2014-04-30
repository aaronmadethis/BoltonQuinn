<?php
/* ================================================================================
ADD THUMBNAIL SUPPORT AND ADDITIONAL IMAGE SIZES
================================================================================ */
if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 250, 200, true ); // default Post Thumbnail dimensions (cropped)
}	
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'hero', 2880, 1800, false );
}

/* ================================================================================
ADD MENUS AND POST FORMAT SUPPORT
================================================================================ */
if ( ! function_exists( 'boltonq_wp_setup' ) ) {

	function boltonq_wp_setup() {
		register_nav_menus( array( 'main' => 'Main Menu' ) );

		add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery', 'audio', 'video') );
	}

}

add_action( 'after_setup_theme', 'boltonq_wp_setup' );


/* ================================================================================
REGISTER OUR SIDEBARS AND WIDGETIZED AREAS.
================================================================================ 
function manitou_widgets_init() {

	register_sidebar(
		array(
			'id' => 'page',
			'name' => __( 'Page' ),
			'description' => __( 'Pages sidebar' ),
			'before_widget' => '<div id="%1$s" class="sidebar-item sidebar-home widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="title widget-title">',
			'after_title' => '</div>'
		)
	);
}
add_action( 'widgets_init', 'manitou_widgets_init' );
*/

/* ================================================================================
SET CONTENT WIDTH DEPENDING ON PAGE
================================================================================ 
if( in_category( 'blog' ) ){
	$content_width = 660;
}else{
	$content_width = 660;
}
*/

/* ================================================================================
GET A CATEGORY ID USING IT'S NAME / SLUG
================================================================================ */
function get_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}

/* ================================================================================
RETURN FROMATED HTML FOR THE BLOG CATEGORIES
================================================================================ */
function blog_cats($id){
	$post_id = $id;
	$categories = get_the_category($post_id);
	$cat_trim = array();
	$html = '';

	foreach ($categories as $key => $value) {
		if($value->cat_name != 'Blog'){
			$cat_trim[] = $value;
		}
	}
	foreach ($cat_trim as $key => $value) {
			$html .= $value->cat_name;
			if(count($cat_trim) > $key + 1){
				$html .= " | ";
			}
	}
	return $html;
}


function create_columns($html){
	$dom = new DOMDocument;
	$dom->loadHTML($html);
	foreach($dom->getElementsByTagName('li') as $node){
	    $array[] = $dom->saveXml($node);
	}
	$result = count($array);
	$col_length = $result / 3;
	$col_length = ceil( $col_length );
	$html='<ul>';

	$counter = 0;
	foreach ($array as $key => $value) {
		if($counter == $col_length ){
			$html .= '</ul>';
			$html .= '<ul>';
			$counter = 0;
		}
		$html .= $value;
		++$counter;
	}
	$html .= '</ul>';

	//print_r($array);
	return $html;
}
/* ================================================================================
CUSTOM CSS FOR WYSWYG EDITOR
================================================================================ 
function tms_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'tms_theme_add_editor_styles' );
*/

/* ================================================================================
SHORTCODE TO CREATE BUTTON IN WYSWYG EDITOR
================================================================================ 
function standard_button( $atts, $content = null ) {
	extract( shortcode_atts(
		array(
			'url' => '',
		), $atts )
	);

	return '<div><a class="page-btn " href="' . $url . '" target="_blank">' . $content . '</a></div>';
}

add_shortcode( 'post_button', 'standard_button' );
*/

/* ================================================================================
OVERRIDE IMG CAPTION SHORTCODE TO FIX 10PX ISSUE.
================================================================================ */
add_filter('img_caption_shortcode', 'fix_img_caption_shortcode', 10, 3);

function fix_img_caption_shortcode($val, $attr, $content = null) {
    extract(shortcode_atts(array(
        'id'    => '',
        'align' => '',
        'width' => '',
        'caption' => ''
    ), $attr));

    if ( 1 > (int) $width || empty($caption) ) return $val;

    return '<div id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="width: ' . (0 + (int) $width) . 'px">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}


/* ================================================================================
COUNTS THE NUMBER OF DATABASE HITS PER PAGE
================================================================================ 
add_action( 'wp_footer', 'tcb_note_server_side_page_speed' );
function tcb_note_server_side_page_speed() {
	date_default_timezone_set( get_option( 'timezone_string' ) );
	$content  = '[ ' . date( 'Y-m-d H:i:s T' ) . ' ] ';
	$content .= 'Page created in ';
	$content .= timer_stop( $display = 0, $precision = 2 );
	$content .= ' seconds from ';
	$content .= get_num_queries();
	$content .= ' queries';
	if( ! current_user_can( 'administrator' ) ) $content = "<!-- $content -->";
	echo $content;
}
*/

/* ================================================================================
FUNCTIONS FOR ADDING JAVASCRIPTS
================================================================================ */
add_action( 'template_redirect', 'my_script_enqueuer' );

function my_script_enqueuer() {

	wp_enqueue_script('jquery');

	$bolton_quinn_js = get_bloginfo('template_directory') . '/js/bq.js';
	wp_enqueue_script('bolton_quinn', $bolton_quinn_js , array('jquery'), '', true);

}

?>