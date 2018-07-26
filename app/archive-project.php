<?php 
get_header();
?>
<div class="breadcrumbs">
	<div class="container">
		<?php echo get_hansel_and_gretel_breadcrumbs() ?>
	</div>
</div>
<div id="isArchive">
	<section class="projects">
		<div class="container">
			<div class="flex-left">

				<?php
				$terms = get_terms( array(
					'taxonomy'=>'project_cat',
					'hide_empty'=>false
				));
				$current_term_id = get_queried_object_id();
				?>
				<a href="<?php echo get_post_type_archive_link( 'project' ) ?>" class="<?php echo 0 == $current_term_id ? 'btn-active' : 'btn-normal' ?>">
					Все Проекты
				</a>					
				<?php	
				foreach ($terms as $key => $term) {
					?>
					<a href="<?php echo get_term_link($term) ?>" class="<?php echo $current_term_id == $term->term_id ? 'btn-active' : 'btn-normal' ?>">
						<?php echo $term->name ?>
					</a>					
					<?php
				}
				?>
			</div>
			<div class="flex-left projects">
				<?php 
					while(have_posts()){
						the_post();
						$meta = get_post_meta($post->ID);
						?>
						<div class="project-content">
							<div class="project-head">
								<img width="312" src="<?php echo the_post_thumbnail_url() ?>" alt="">
							</div>
							<div class="project-bottom">
								<div>
									<p class="project-link"><a href="#"><?php the_title() ?></a></p>
									<p class="project-floor"><?php echo isset($meta['description']) ? $meta['description'][0] : '' ?><br>Площадь <?php echo isset($meta['area']) ? $meta['area'][0] : '' ?> м2</p>
									<p class="project-price">от <span><?php echo isset($meta['price']) ? $meta['price'][0] : '' ?></span> руб.</p>
									<a href="<?php echo get_the_permalink() ?>" class="more"><span>ПОДРОБНЕЕ</span> <i class="fa fa-angle-right"></i></a>
								</div>
							</div>
						</div>
						<?php
					}
				?>
			</div>
			<?php if($wp_query->max_num_pages > 1){ ?>
				<div class="center more-button">
					<a href="#" class="more" onclick="loadMoreHandler();return false">
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

<?php
get_footer();
?>