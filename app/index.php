<?php get_header() ?>
	<div id="ishome">
		<section class="banner1" style="background-image: url(<?php echo get_theme_mod('index_banner_image') ?>)">
			<div class="container ">
				<div class="h1cont">
					<h1 id="index_banner_edit_button"><?php echo get_theme_mod('index_banner_title') ?></h1>
				</div>
			</div>
		</section>
		<section class="about-us section">
			<div class="title">
				<h1 id="index_section_about_us_edit_button"><?php echo get_theme_mod('index_section_about_us_title') ?></h1>
				<ul class="subtitle">
					<li>надежность</li
					><li>стабильность</li
					><li>высокий резульатат</li>
				</ul>
			</div>
			<div class="container">
				<div class="card-row" id="cards">
					<?php 
					$cards = get_theme_mod('section_about_us_cards');
					foreach ($cards as $key => $card) {
						$img = is_numeric($card['image']) ? wp_get_attachment_image_src($card['image'])[0] : $card['image'];
						?>
						<div class="card">
							<div class="card-top">
								<img src="<?php echo $img ?>" alt="">
							</div>
							<div class="card-bottom">
								<?php echo $card['text'] ?>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</section>
		<section class="about-us2 section">
			<div class="title">
				<h1 id="index_section_2_edit_button"><span id="index_section_2_title"><?php echo get_theme_mod('index_section_2_title') ?></span></h1>
				<ul class="subtitle">
					<li>подбор</li
					><li>доставка</li
					><li>монтаж </li
					><li>обслуживание</li>
				</ul>
			</div>
			<div class="container">
				<?php 
				$cards = get_theme_mod('section_2_cards');
				foreach ($cards as $key => $card) {
					$img = is_numeric($card['image']) ? wp_get_attachment_image_src($card['image'],'full')[0] : $card['image'];
					?>					
					<a href="<?php echo $card['link'] ?>" class="col-xs-12 col-sm-4 card">
						<div class="card-top">
							<img src="<?php echo $img ?>" alt="">
							<div class="card-top-text">
								<?php echo $card['text'] ?>
							</div>
						</div>
						<div class="card-bottom">
							<?php echo $card['title'] ?>
						</div>
					</a>
					<?php
				}
				?>
			</div>
		</section>
		<section class="section section-call-us">
			<h2>Вас заинтересовали наши проекты?</h2>
			<p>Расскажите нам о ваших потребностях и мы проконсультируем вас, изготовим проект вашего дома<br>
			или подготовим необходимый пиломатериал. Напишите нам и мы ответим в ближайшее время.</p>
			<a href="#" class="button">Отправить заявку</a>
		</section>
		<section class="about-us3 section">
			<div class="title">
				<h1>ЭТАПЫ РАБОТЫ</h1>
				<ul class="subtitle">
					<li></li
					><li>полный спектр услуг</li
					><li></li>
				</ul>
			</div>
			<div class="container">
				<div class="card-row">
					<a href="#">
						<div class="card">
							<div class="card-top">
								<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-5.png" alt="">
							</div>
							<p class="card-bottom">Лесозаготовка</p>
						</div>
					</a>
					<a href="#">
						<div class="card">
							<div class="card-top">
								<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-6.png" alt="">
							</div>
							<p class="card-bottom">Разработка проекта</p>
						</div>
					</a>
					<a href="#">
						<div class="card">
							<div class="card-top">
								<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-7.png" alt="">
							</div>
							<p class="card-bottom">Изготовление сруба</p>
						</div>
					</a>
					<a href="#">
						<div class="card">
							<div class="card-top">
								<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-8.png" alt="">
							</div>
							<p class="card-bottom">Готовый проект</p>
						</div>
					</a>
				</div>
			</div>
		</section>
		<section class="about-us4 section">
			<div class="title">
				<h1>ОКАЗЫВАЕМ УСЛУГИ</h1>
				<ul class="subtitle">
					<li></li
					><li>ваш новый дом под ключ</li
					><li></li>
				</ul>
			</div>
			<div class="container  ">
				<div class="row">
					<div class="col-sm-6 col-xs-12 card card-left ">
						<div class="col-xs-10 col-sm-10 card-content">
							<h3>РАЗРАБОТКА</h3>
							<p class="card-more"><a href="#">подробнее</a></p>
							<p class="card-text">Разрабатываем проекты для производства  и строительства деревян</p>
						</div>
						<div class="col-sm-2 col-xs-2  ">
							<div class="card-img">
								<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-9.png" alt="">
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12 card card-right ">
						<div class="col-sm-2 col-xs-2  ">
							<div class="card-img">
								<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-10.png" alt="">
							</div>
						</div>
						<div class="col-sm-10 col-xs-10 card-content">
							<h3>МОНТАЖНЫЕ РАБОТЫ</h3>
							<p class="card-more"><a href="#">подробнее</a></p>
							<p class="card-text">Монтажные работы  (сборка срубов «под крышу»)</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-xs-12 card card-left ">
						<div class="col-sm-10 col-xs-10 card-content">
							<h3>КОМПЛЕКТОВАНИЕ</h3>
							<p class="card-more"><a href="#">подробнее</a></p>
							<p class="card-text">Комплектование расходными материалами</p>
						</div>
						<div class="col-sm-2 col-xs-2  ">
							<div class="card-img">
								<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-11.png" alt="">
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12 card card-right ">
						<div class="col-sm-2 col-xs-2  ">
							<div class="card-img">
								<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-12.png" alt="">
							</div>
						</div>
						<div class="col-sm-10 col-xs-10 card-content">
							<h3>ДОСТАВКА</h3>
							<p class="card-more"><a href="#">подробнее</a></p>
							<p class="card-text">Доставка домокомплектов в регионы РФ</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="about-us5 section">
			<div class="title">
				<h1>ПРЕИМУЩЕСТВА НАШЕЙ РАБОТЫ</h1>
				<ul class="subtitle">
					<li></li
					><li>мы дорожим соей репутацией</li
					><li></li>
				</ul>
			</div>
			<div class="container  ">
				<div class="card-row">
					<div class="card">
						<div class="card-img">
							<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-13.png" alt="">
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
							<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-14.png" alt="">
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
							<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-15.png" alt="">
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
							<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-16.png" alt="">
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
							<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-17.png" alt="">
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
							<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-18.png" alt="">
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
		<section class="section section-call-us">
			<h2>Вас заинтересовали наши проекты?</h2>
			<p>
				Расскажите нам о ваших потребностях и мы проконсультируем вас, изготовим проект вашего дома<br>
				или подготовим необходимый пиломатериал. Напишите нам и мы ответим в ближайшее время.
			</p>
			<a href="#" class="button">Отправить заявку</a>
		</section>
		<section class="about-us6 section">
			<div class="title">
				<h1>КАК МЫ РАБОТАЕМ</h1>
				<ul class="subtitle">
					<li></li
					><li>6 простых шагов к новому дому</li
					><li></li>
				</ul>
			</div>
			<div class="container  ">
				<div class="card-row wtf">
					<div class="card">
						<div class="card-inner">
							<div class="card-top">
								<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-19.png" alt="">
							</div>
							<div class="card-middle">
								<i class="fa fa-circle"></i> 1 шаг <i class="fa fa-circle"></i>
							</div>
							<div class="card-bottom">
								ПРИЕМ<br> ЗАЯВКИ
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-inner">
							<div class="card-top">
								<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-20.png" alt="">
							</div>
							<div class="card-middle">
								<i class="fa fa-circle"></i> 2 шаг <i class="fa fa-circle"></i>
							</div>
							<div class="card-bottom">
								ПРЕДВАРИТЕЛЬНЫЙ<br> РАСЧЕТ
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-inner">
							<div class="card-top">
								<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-21.png" alt="">
							</div>
							<div class="card-middle">
								<i class="fa fa-circle"></i> 3 шаг <i class="fa fa-circle"></i>
							</div>
							<div class="card-bottom">
								РАЗРАБОТКА<br> ПРОЕКТА
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-inner">
							<div class="card-top">
								<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-22.png" alt="">
							</div>
							<div class="card-middle">
								<i class="fa fa-circle"></i> 4 шаг <i class="fa fa-circle"></i>
							</div>
							<div class="card-bottom">
								ПОДПИСАНИЕ<br>ДОГОВОРА
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-inner">
							<div class="card-top">
								<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-23.png" alt="">
							</div>
							<div class="card-middle">
								<i class="fa fa-circle"></i> 5 шаг <i class="fa fa-circle"></i>
							</div>
							<div class="card-bottom">
								ИЗГОТОВЛЕНИЕ<br>СРУБА 
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-inner">
							<div class="card-top">
								<img src="<?php echo get_template_directory_uri() . '/' ?>img/icon-24.png" alt="">
							</div>
							<div class="card-middle">
								<i class="fa fa-circle"></i> 6 шаг <i class="fa fa-circle"></i>
							</div>
							<div class="card-bottom">
								ДОСТАВКА<br> И СБОРКА 
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

<?php get_footer() ?>