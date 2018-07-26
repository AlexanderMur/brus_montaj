<?php

add_action( 'init', function() {
	$labels = array(
		'name'               => __( 'Проекты', 'text-domain' ),
		'singular_name'      => __( 'Проект', 'text-domain' ),
		'add_new'            => _x( 'Add New Проект', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Проект', 'text-domain' ),
		'edit_item'          => __( 'Edit Проект', 'text-domain' ),
		'new_item'           => __( 'New Проект', 'text-domain' ),
		'view_item'          => __( 'View Проект', 'text-domain' ),
		'search_items'       => __( 'Search Проекты', 'text-domain' ),
		'not_found'          => __( 'No Проекты found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Проекты found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Проект:', 'text-domain' ),
		'menu_name'          => __( 'Проекты', 'text-domain' ),
	);
	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'supports'			  => array('thumbnail','title')
	);
	register_post_type( 'project', $args );
	register_taxonomy(
		'project_cat',
		'project',
		array(
			'hierarchical' => true,
			'label' => __( 'Категории Проектов' ),
			'rewrite' => array( 'slug' => 'project-category' ),
		)
	);
});
add_action( 'init', function() {
	$labels = array(
		'name'               => __( 'Фото работ', 'text-domain' ),
		'singular_name'      => __( 'Фото работ', 'text-domain' ),
		'add_new'            => _x( 'Add New Фото работ', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Фото работ', 'text-domain' ),
		'edit_item'          => __( 'Edit Фото работ', 'text-domain' ),
		'new_item'           => __( 'New Фото работ', 'text-domain' ),
		'view_item'          => __( 'View Фото работ', 'text-domain' ),
		'search_items'       => __( 'Search Фото работ', 'text-domain' ),
		'not_found'          => __( 'No Фото работ found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Фото работ found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Фото работ:', 'text-domain' ),
		'menu_name'          => __( 'Фото работ', 'text-domain' ),
	);
	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'supports'			  => array('thumbnail','title')
	);
	register_post_type( 'port', $args );
});
/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function prefix_register_name() {

	$labels = array(
		'name'               => __( 'Сертификаты', 'text-domain' ),
		'singular_name'      => __( 'Сертификат', 'text-domain' ),
		'add_new'            => _x( 'Add New Сертификат', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Сертификат', 'text-domain' ),
		'edit_item'          => __( 'Edit Сертификат', 'text-domain' ),
		'new_item'           => __( 'New Сертификат', 'text-domain' ),
		'view_item'          => __( 'View Сертификат', 'text-domain' ),
		'search_items'       => __( 'Search Сертификаты', 'text-domain' ),
		'not_found'          => __( 'No Сертификаты found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Сертификаты found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Сертификат:', 'text-domain' ),
		'menu_name'          => __( 'Сертификаты', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'supports'			  => array('thumbnail','title')
	);

	register_post_type( 'sertif', $args );
}

add_action( 'init', 'prefix_register_name' );

add_action('add_meta_boxes', function(){
	add_meta_box('project_meta_box', 'Project Details', 'display_project_box', 'project', 'normal', 'high');
});
function display_project_box($post) {
	var_dump(get_post_meta($post->ID));
	?>
	<table>
		<tr>
			<td>
				<label>
					Цена, руб<br>
					<input type="text" name="price">
				</label>
			</td>
			<td>
				<label>
					Площадь, м<sup>2</sup><br>
					<input type="text" name="area">
				</label>
			</td>
			<td>
				<label>
					Этажность<br>
					<select name="floor" id="">
						<option value="1">1-этажный</option>
						<option value="2">2-этажный</option>
					</select>
				</label>
			</td>
			<td>
				<label>
					Краткое описание<br>
					<input type="text" name="description">
				</label>
			</td>
			<td>
				<label>
					Материал<br>
					<input type="text" name="material">
				</label>
			</td>
		</tr>
	</table>
	<?php
}
add_action('save_post', 'save_fields', 10, 2);
function save_fields($post_id, $post){
	if ($post->post_type == 'project') {
		if (isset($_POST['price']) && $_POST['price'] != '') {
			update_post_meta($post_id, 'price', $_POST['price']);
		}
		if (isset($_POST['area']) && $_POST['area'] != '') {
			update_post_meta($post_id, 'area', $_POST['area']);
		}
		if (isset($_POST['floor']) && $_POST['floor'] != '') {
			update_post_meta($post_id, 'floor', $_POST['floor']);
		}
		if (isset($_POST['description']) && $_POST['description'] != '') {
			update_post_meta($post_id, 'description', $_POST['description']);
		}
		if (isset($_POST['meterial']) && $_POST['meterial'] != '') {
			update_post_meta($post_id, 'meterial', $_POST['meterial']);
		}
		if($_GET['bulk_edit']){
			if (isset($_GET['area']) && $_GET['area'] != '') {
				update_post_meta( $post_id, 'area', $_GET['area'] );
			}
			if (isset($_GET['description']) && $_GET['description'] != '') {
				update_post_meta( $post_id, 'description', $_GET['description'] );
			}
			if (isset($_GET['price']) && $_GET['price'] != '') {
				update_post_meta( $post_id, 'price', $_GET['price'] );
			}
		}
	}
	if ($post->post_type == 'project' || $post->post_type == 'port') {
		if (isset($_POST['imgs']) && $_POST['imgs'] != '') {
			update_post_meta($post_id, 'imgs', $_POST['imgs']);
		}
	}
}

add_action('add_meta_boxes', function () {  
    add_meta_box(  
        'metaimage_meta_box',
        'Галерея изображений',
        'show_my_metaimage_meta_box', 
        array('project','port'), 
        'normal',
        'high');
});
add_action('admin_enqueue_scripts',function($hook){
    $screen = get_current_screen();
	if ( $hook == 'post.php' && ($screen->post_type == 'project' || $screen->post_type == 'port') ) {
		wp_enqueue_script( 'media-project',get_template_directory_uri() . '/js/media-project.js');
    }
});
function show_my_metaimage_meta_box($e) {
	$ids = get_post_meta($e->ID,'imgs',true);
    ?>
	<div id="imgContainer">
	    <?php 
	    if($ids){
	    	?>
		    	<?php 
				foreach ($ids as $key => $id) {
					$src = wp_get_attachment_image_src($id)[0];
					?>
					<img src="<?php echo $src ?>" alt="">
					<?php
				}    	
		    	?>
	    	<?php
	    }
	    ?>
    </div>
    <button onclick="frame.open();return false">Выбрать изображения</button>
    <?php

};
add_filter( 'manage_project_posts_columns', function($columns){
	$columns['area'] = 'Площадь';
	return $columns;
},10, 1 );
add_filter( 'manage_edit-project_sortable_columns', function ( $columns ) {
    $columns['area'] = 'slice';
    return $columns;
} );

add_action( 'pre_get_posts', function ( $query ) {
    if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
 
    if( 'slice' == $orderby ) {
        $query->set('meta_key','area');
        $query->set('orderby','meta_value_num');
    }
} );

add_filter( 'manage_project_posts_custom_column', function($columns){
	global $post;
	echo get_post_meta($post->ID,'area',true) . 'м<sup>2</sup>';
},10, 1 );
add_action( 'bulk_edit_custom_box', function($e,$b){
	?>
	<fieldset class="inline-edit-col-right"><div class="inline-edit-col">		
		<div class="inline-edit-group wp-clearfix">
			<label class="inline-edit-status alignleft">
				<span class="title">Плошадь</span>
				<input type="text" name="area">
			</label>
		<div class="inline-edit-group wp-clearfix">
			<label class="inline-edit-status alignleft">
				<span class="title">Описание</span>
				<input type="text" name="description">
			</label>
		</div>
		<div class="inline-edit-group wp-clearfix">
			<label class="inline-edit-status alignleft">
				<span class="title">Цена</span>
				<input type="text" name="price">
			</label>
		</div>
		</div>		
	</div></fieldset>
	<?php
}, 10, 2 );
add_action( 'quick_edit_custom_box', function($e,$b){
	?>
	<fieldset class="inline-edit-col-right"><div class="inline-edit-col">		
		<div class="inline-edit-group wp-clearfix">
			<label class="inline-edit-status alignleft">
				<span class="title">Плошадь</span>
				<input type="text" name="area">
			</label>
		<div class="inline-edit-group wp-clearfix">
			<label class="inline-edit-status alignleft">
				<span class="title">Описание</span>
				<input type="text" name="description">
			</label>
		</div>
		<div class="inline-edit-group wp-clearfix">
			<label class="inline-edit-status alignleft">
				<span class="title">Цена</span>
				<input type="text" name="price">
			</label>
		</div>
		</div>		
	</div></fieldset>
	<?php
}, 10, 2 );
?>