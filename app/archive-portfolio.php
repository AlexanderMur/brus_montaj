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
					<div class="post-thumb-container">
						<img class="post-thumb" width="100%" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="title">
						<h1>Сказка</h1>
						<ul class="subtitle">
							<li>деревянный дом</li>
							<li>индивидуальный заказ</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php
get_footer();
?>
