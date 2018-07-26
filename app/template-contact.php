<?php 
/*
Template Name: Contact
*/
?>

<?php 
get_header();
?>
<div id="isContact">	
	<section class="banner1" style="background-image: url(<?php echo get_theme_mod('index_banner_image') ?>)">
		<div class="container ">
			<div class="h1cont">
				<h1 id="index_banner_edit_button"><?php echo get_theme_mod('index_banner_title') ?></h1>
			</div>
		</div>
	</section>
	<section class="contact-inform">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<iframe width="100%" height="580" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:<?php echo get_theme_mod('place_id','ChIJrTLr-GyuEmsRBfy61i59si0') ?>&key=AIzaSyCRyc-7q2jZQzq5GQDzewBVuM2k-KoFaU4" allowfullscreen></iframe>
				</div>
				<div class="col-md-6">
					<?php the_post() ?>
					<?php the_content() ?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php
get_footer();
?>
