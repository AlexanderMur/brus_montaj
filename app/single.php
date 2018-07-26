<?php 
get_header();
?>
<div id="isArchive">
	<div class="breadcrumbs">
		<div class="container">
			<?php echo get_hansel_and_gretel_breadcrumbs() ?>
			<?php var_dump($post) ?>
			<?php var_dump(get_the_terms( $post, 'cust_category' )) ?>
		</div>
	</div>
</div>
<?php
get_footer();
?>