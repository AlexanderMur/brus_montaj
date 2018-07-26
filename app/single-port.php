<?php 
get_header();
?>
<div class="breadcrumbs">
	<div class="container">
		<?php echo get_hansel_and_gretel_breadcrumbs() ?>
	</div>
</div>
<div id="isArchivePortfolio">
	<section class="portfolio-selected">
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
	</section>
	<section class="portfolio-gallery section">
		<div class="container">
			<div class="ports">
				<?php
				$query = new WP_query(array(
					'post_type' => 'port'
				));
				while($query->have_posts()){
					$query->the_post();
					
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
				?>
			</div>
			</div>
			<?php if(1 < $query->max_num_pages){ ?>
				<div class="center more-button">
					<a href="#" class="more" onclick="loadMoreHandler_port();return false">
						<span>ЕЩЕ ПРОЕКТЫ</span> <i class="fa fa-angle-right"></i>
					</a>
					<img class="loader" src="https://static.matrimonialsindia.com/images/loader.gif" alt="">
				</div>
			<?php } ?>
		</div>
	</section>

	<section class="section section-call-us">
		<h2 class="red">Вас заинтересовали наши проекты?</h2>
		<p>Расскажите нам о ваших потребностях и мы проконсультируем вас, изготовим проект вашего дома<br>
		или подготовим необходимый пиломатериал. Напишите нам и мы ответим в ближайшее время.</p>
		<a href="#" class="button">Отправить заявку</a>
	</section>
</div>
<script>
	setView = function(src){
		document.getElementsByClassName('post-img')[0].src = src
	}
	wp_api.max_num_pages = <?php echo $query->max_num_pages ?>
</script>
<?php

get_footer();
?>
