<?php 
get_header();
?>
<div class="breadcrumbs">
	<div class="container">
		<?php echo get_hansel_and_gretel_breadcrumbs() ?>
	</div>
</div>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/libs/lightslider/lightslider.min.css'?>">
<style>	

.demo #lightSlider img {
    cursor: pointer;
}
.drag img, .drag{
  cursor: -webkit-grabbing !important;
}
</style>
<div id="isSingleProject">
	<section class="projects">
		<div class="container">
			<div class="flex-left categories">

				<?php
				$terms = get_terms( array(
					'taxonomy'=>'project_cat',
					'hide_empty'=>false
				));

				$term_objects        = wp_get_post_terms( $post->ID, 'project_cat');
				if(!empty($term_objects)){
					$current_term_id = $term_objects[get_youngest($term_objects)]->term_id;
				} else {
					$current_term_id = 0;
				}

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
			<div class="project-single">
				<div class="row">
					<div class="col-sm-6">
						<div class="view">
							<img id="viewImg" src="<?php echo get_the_post_thumbnail_url()?>" alt="" class="img-responsive">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="title">
							<h1><?php the_title() ?></h1>
							<ul class="subtitle">								
								<li><?php echo get_post_meta($post->ID,'floor',true) ?>-этажный</li>
								<li><?php echo get_post_meta($post->ID,'description',true) ?></li>
							</ul>
						</div>
						<?php if($ids = get_post_meta($post->ID,'imgs',true)){ ?>
							<div class="slider">
								<div class="demo">	
									<div class="thumbs" id="lightSlider">
										<?php								
										foreach ($ids as $key => $id) {
											$url = wp_get_attachment_image_src($id,'full')[0];
											?>
											<img height="100" src="<?php echo $url ?>" alt="a">
											<?php	
										}
										?>
									</div>
								</div>
								<button class="prev"><i class="fa fa-chevron-left"></i></button>
								<button class="next"><i class="fa fa-chevron-right"></i></button>
							</div>
						<?php } else echo '<div style="height: 113px"></div>'?>
						<script>
						</script>
						<div class="details">
							<div class="row">
								<div class="col-sm-7">
									<div class="card-row">
										<div class="card">
											<div class="card-left">
												<img src="<?php echo get_template_directory_uri() . '/' ?>img/ico-1.png" alt="">
											</div>
											<div class="card-text">
												Материал: <b>Оциледрированное бревно</b>
											</div>
										</div>
										<div class="card">
											<div class="card-left">
												<img src="<?php echo get_template_directory_uri() . '/' ?>img/ico-3.png" alt="">
											</div>
											<div class="card-text">
												Площадь: <b class="big">87 м<sup>2</sup></b>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-5">
									<div class="card-row">
										<div class="card">
											<div class="card-left">
												<img src="<?php echo get_template_directory_uri() . '/' ?>img/ico-2.png" alt="">
											</div>
											<div class="card-text floor">
												Количество комнат: <b>3 комнаты</b> на первом этаже <div class="br"></div><b>3 комнаты</b> на втором этаже
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	<section class="section section-call-us">
		<h2 class="red">Вас заинтересовали наши проекты?</h2>
		<p>Расскажите нам о ваших потребностях и мы проконсультируем вас, изготовим проект вашего дома<br>
		или подготовим необходимый пиломатериал. Напишите нам и мы ответим в ближайшее время.</p>
		<a href="#" class="button">Отправить заявку</a>
	</section>
</div>
<style>
</style>
<script>
loadJs = function(src){
	var script = document.createElement('script');
	script.src = src;
	document.head.appendChild(script);
	return script
}
setTimeout(function(){
	loadJs('<?php echo get_template_directory_uri() . '/libs/lightslider/lightslider.min.js' ?>').onload = function(){
		
		slider = $('#lightSlider').lightSlider({
			loop: false,
			pager: false,
			autoWidth: true,
			gallery: true,
			controls: false,
			marginSlide: 0
		});

		slider.on('mousedown',function(e){
			startX = e.pageX
			$(this).data('down',true)
			this.onmousemove = function(e){
				if(startX != e.pageX && !$(this).data('moved') && $(this).data('down')){
					console.log('dragstart')
					$('body').addClass('drag')
					$(this).data('moved',true)
				}
			}
		})
		$(document).on('mouseup',function(e){
			if(slider.data('moved')){
				$('body').removeClass('drag')
				slider.data('moved',false)
			}
			slider[0].onmousemove = null
			slider.data('down',false)
		})
		slider.on('mouseup','img',function(){
			console.log($(this).parent().data('down'))
			if(!$(this).parent().data('moved') && $(this).parent().data('down')){
				//Клик здесь
				viewImg.src = this.src
			}
		})
		$('.prev').click(function(){
			slider.goToPrevSlide()
		})
		$('.next').click(function(){
			slider.goToNextSlide()
		})
	}
},1000)

</script>
<?php
get_footer();
?>


<div class="demo">
    <div id="lightSlider">
            <img height="100" src="http://picsum.photos/100/101" />
            <img height="100" src="http://picsum.photos/100/102" />
            <img height="100" src="http://picsum.photos/100/106" />
            <img height="100" src="http://picsum.photos/100/107" />
            <img height="100" src="http://picsum.photos/100/109" />
            <img height="100" src="http://picsum.photos/100/105" />
            <img height="100" src="http://picsum.photos/100/108" />
            <img height="100" src="http://picsum.photos/100/106" />
            <img height="100" src="http://picsum.photos/100/102" />
            <img height="100" src="http://picsum.photos/100/106" />
            <img height="100" src="http://picsum.photos/100/101" />
            <img height="100" src="http://picsum.photos/100/105" />
    </div>
</div>