<?php 
/*
Template Name: About

*/

?>
<?php 
get_header();
?>
<div class="breadcrumbs">
	<div class="container">
		<?php echo get_hansel_and_gretel_breadcrumbs() ?>
	</div>
</div>
<div id="isAbout">
	<section class="entry">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="img-about">
						a
					</div>
				</div>
				<div class="col-sm-6">
					<div class="post-right">
						<div class="post-content">
							<?php echo apply_filters('the_content', $post->post_content) ?>
						</div>
						<div class="section section-call-us">
							<h3>ЗАДАТЬ ВОПРОС</h3>
							<p>
								Оставьте свои контактные данные, и наш специалист свяжется с вами<br>
								в ближайшее время, чтобы ответить на ваши вопросы
							</p>
							<a href="#" class="button">Отправить заявку</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="about-us5 section">
		<div class="container">
			<div class="title">
				<h1>ТЕХНОЛОГИИ</h1>
				<ul class="subtitle">
					<li>Современность</li>
					<li>Надежность</li>
				</ul>
			</div>
			<p>
				Клееный брус (деревянный) — это сборное четырёхгранное изделие, получаемое склеиванием 
				тщательно оструганных и просушенных досок, обладающее повышенной прочностью, устойчивостью 
				к деформациям DSC02449_1, долговечностью и практически идеальным соответствием размеров 
				нормативу по всей длине.
			</p>
			<div class="card-row">
				<div class="card">
					<div class="card-img">
						<div class="card-img2">
							<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-13.png" alt="">
						</div>
					</div>
					<div class="card-content">
						<div class="card-title">Производство</div>
						<div class="card-text">
							мы прямые производители:<br>
							имеем собственное производство<br>
							и сырьевую базу
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-img">
						<div class="card-img2">
							<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-14.png" alt="">
						</div>
					</div>
					<div class="card-content">
						<div class="card-title">Проект БЕСПЛАТНО</div>
						<div class="card-text">
							разработка бесплатного проекта<br>
							на производстве с учетом опыта<br>
							в строительстве
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-img">
						<div class="card-img2">
							<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-15.png" alt="">
						</div>
					</div>
					<div class="card-content">
						<div class="card-title">Удобная форма оплаты</div>
						<div class="card-text">
							любые формы 
							и удобный порядок оплаты
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-img">
						<div class="card-img2">
							<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-16.png" alt="">
						</div>
					</div>
					<div class="card-content">
						<div class="card-title">Полный спектр услуг</div>
						<div class="card-text">
							оказываем весь перечень услуг<br>
							и производим все необходимые<br>
							материалы для строительства<br>
							деревянного дома или бани<br>
							от проекта до монтажа
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-img">
						<div class="card-img2">
							<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-17.png" alt="">
						</div>
					</div>
					<div class="card-content">
						<div class="card-title">Все включено</div>
						<div class="card-text">
							оформление договора, сметы<br>
							и предоставление гарантии:<br>
							фиксированная цена<br>
							на строительство
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-img">
						<div class="card-img2">
							<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-18.png" alt="">
						</div>
					</div>
					<div class="card-content">
						<div class="card-title">Качество</div>
						<div class="card-text">
							используем только качественный<br>
							лес Кировской области
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="sertificats section">		
		<div class="container">
			<div class="title">
				<h1>СЕРТИФИКАТЫ</h1>
				<ul class="subtitle">
					<li></li>
					<li>заверено  профессионалами</li>
					<li></li>
				</ul>
			</div>
			<p>
				Клееный брус (деревянный) — это сборное четырёхгранное изделие, получаемое склеиванием 
				тщательно оструганных и просушенных досок, обладающее повышенной прочностью, устойчивостью 
				к деформациям DSC02449_1, долговечностью и практически идеальным соответствием размеров 
				нормативу по всей длине.
			</p>
			<?php 
			$query = new WP_Query('post_type=sertif&posts_per_page=4');

			?>
			<div class="card-row" style="margin-top:60px">
				<?php 
				while($query->have_posts()){
					$query->the_post();
					?>
					<img style="margin-bottom:20px" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
					<?php
				}
				?>
			</div>
			<?php if($query->max_num_pages > 1){ ?>
				<div class="center more-button">
					<a href="<?php echo get_post_type_archive_link( 'sertif' ) ?>" class="more">
						<span>ВСЕ СЕРТИФИКАТЫ</span> <i class="fa fa-angle-right"></i>
					</a>
				</div>
			<?php } ?>
		</div>
	</section>
	
		<section class="section section-call-us">
			<h2>Вас заинтересовали наши проекты?</h2>
			<p>
				Расскажите нам о ваших потребностях и мы проконсультируем вас, изготовим проект вашего дома<br>
				или подготовим необходимый пиломатериал. Напишите нам и мы ответим в ближайшее время.
			</p>
			<a href="#" class="button">Отправить заявку</a>
		</section>
</div>
<?php
get_footer();
?>
