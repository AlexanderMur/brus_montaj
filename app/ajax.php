<?php 

add_action('wp_ajax_get_projects','ajax_get_projects');
add_action('wp_ajax_nopriv_get_projects','ajax_get_projects');
function ajax_get_projects(){
	$args = array(
		'post_type' => 	'project',
		'paged'     => !isset($_GET['paged']) ? 1 : +$_GET['paged'],
		'tax_query' => !isset($_GET['term_id']) ? array() : array(
			'relation' => 'OR',
			array(
				'taxonomy'         => 'project_cat',
				'field'            => 'id',
				'terms'            => array( $_GET['term_id'] ),
				'include_children' => true,
				'operator'         => 'IN',
			)
		)
	);	
	$query = new WP_Query( $args );
	while($query->have_posts()){
		$query->the_post();
		$post = $query->post;		
		$GLOBALS['post'] = $post;
		$meta = get_post_meta($post->ID);
		?>
		<div class="project-content">
			<div class="project-head">
				<img width="312" src="<?php echo the_post_thumbnail_url() ?>" alt="">
			</div>
			<div class="project-bottom">
				<div>
					<p class="project-link"><a href="#"><?php the_title() ?></a></p>
					<p class="project-floor"><?php echo isset($meta['description']) ? $meta['description'][0] : '' ?><br>Площадь <?php echo isset($meta['area']) ? $meta['area'][0] : 'no' ?> м2</p>
					<p class="project-price">от <span><?php echo isset($meta['price']) ? $meta['price'][0] : '' ?></span> руб.</p>
					<a href="<?php echo get_the_permalink() ?>" class="more"><span>ПОДРОБНЕЕ</span> <i class="fa fa-angle-right"></i></a>
				</div>
			</div>
		</div>
		<?php
	}
	die();
}

add_action('wp_ajax_get_single_port','ajax_get_single_port');
add_action('wp_ajax_nopriv_get_single_port','ajax_get_single_port');
function ajax_get_single_port(){
	$basename = wp_basename( $_POST['link'] );
	$post = get_page_by_path( $basename, OBJECT, 'port' ) ;
	if(!$post){
		$query = new WP_Query('post_type=port');
		$post = $query->posts[0];
	}
	$GLOBALS['post'] = $post;
	if($post){
		$meta = get_post_meta($post->ID);
		?>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="post-img-container">
						<img class="post-img" width="100%" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="title">
						<h1><?php the_title() ?></h1>
						<ul class="subtitle">
							<li>деревянный дом</li>
							<li>индивидуальный заказ</li>
						</ul>
					</div>
					<div class="post-gallery">
						<?php
						$imgs = get_post_meta($post->ID,'imgs',true);
						foreach ($imgs as $key => $img) {
							$img_src = wp_get_attachment_image_src($img,'full')[0];
							?>
							<div onclick="setView('<?php echo $img_src ?>')" class="gallery-item sleft">
								<div class="gallery-link" style="background-image: url(<?php echo $img_src ?>)"></div>
								<div class="hover">
									<i class="fa fa-eye"></i>
								</div>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	die();
}

add_action('wp_ajax_get_ports','ajax_get_ports');
add_action('wp_ajax_nopriv_get_ports','ajax_get_ports');
function ajax_get_ports(){
	$paged = isset($_GET["paged"]) ? $_GET["paged"] : 1;
	$query = new WP_Query('post_type=port&paged='.$paged);
	while($query->have_posts()){
		$query->the_post();
		$meta = get_post_meta($post->ID);
		?>
		<div class="gallery-item" onclick="return galleryHandler('<?php echo get_the_permalink() ?>')">
			<a
			 class="gallery-link"
			 href="<?php echo get_the_permalink() ?>"
			 style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)"
			>
			</a>
			<div class="hover">
				<i class="fa fa-eye"></i>
			</div>
		</div>				
		<?php
	}
	
	die();
}

add_action('wp_enqueue_scripts',function(){
	global $wp_query;
	wp_enqueue_script( 'main-ajax', get_template_directory_uri() . '/js/ajax.js');
	wp_localize_script( 'main-ajax', 'wp_api', array(
		'ajaxUrl' => admin_url('admin-ajax.php'),
		'paged' => $wp_query->query_vars['paged'] == 0 ? 1 : $wp_query->query_vars['paged'],
		'term_id' => isset(get_queried_object()->term_id) ? get_queried_object()->term_id : null,
		'max_num_pages' => $wp_query->max_num_pages
	));
});
?>