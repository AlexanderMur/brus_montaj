<?php 

require __DIR__ . '/customize/customizer.php';
require __DIR__ . '/post_types.php';
require __DIR__ . '/ajax.php';
require __DIR__ . '/brd_func.php';

add_action( 'get_footer', function() {
	wp_enqueue_style("main-style", get_template_directory_uri() . "/style.css" );
	wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/js/scripts.min.js', null, false, true );
});
register_nav_menu( 'menu_in_head', 'menu in head' );

add_action('nav_menu_css_class', function ($classes, $item) {
	global $post;
	if(!is_page()){
		if($item->object == $post->post_type){
			$classes[] = 'current-menu-item';
		}
	}
	return $classes;
},10,2);

?>