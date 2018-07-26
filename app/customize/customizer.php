<?php


add_action( 'customize_register', function($wp_customize){
	$wp_customize->add_panel( 'index_panel', array(
		'title'      => 'Главаня страница',
		'capability' => 'edit_theme_options'
	));
		$wp_customize->add_section( 'banner_section' , array(
		    'title'      => 'Баннер',
		    'panel' => 'index_panel'
		));
			$wp_customize->add_setting( 'index_banner_title' , array(
				'default'    => 'Lorem ipsum dolor sit amet,<br>consectetur adipisicing lit.<br> Alias, illum!',
				'transport'  => 'refresh',
			));
			$wp_customize->add_control('index_banner_title', array(
				'label'      => 'Текст',
				'section'    => 'banner_section',
				'type'       => 'textarea'
			));
			$wp_customize->selective_refresh->add_partial( 'index_banner_title', array(
			    'selector' => '#index_banner_edit_button', // You can also select a css class
			) );
			$wp_customize->add_setting( 'index_banner_image' , array(
				'default'    => '',
				'transport'  => 'refresh',
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'index_banner_image', array(
				'label'      => 'Фон',
				'section'    => 'banner_section',
			)));
		$wp_customize->add_section( 'index_section_about_us' , array(
		    'title'      => 'Секция о нас',
		    'panel' => 'index_panel'
		));
			$wp_customize->add_setting( 'index_section_about_us_title' , array(
				'default'    => 'О нас',
				'transport'  => 'refresh',
			));
			$wp_customize->add_control('index_section_about_us_title', array(
				'label'      => 'Заголовок',
				'section'    => 'index_section_about_us',
				'type'       => 'text'
			));
			$wp_customize->selective_refresh->add_partial( 'index_section_about_us_title', array(
			    'selector' => '#index_section_about_us_edit_button', // You can also select a css class
			) );
		$wp_customize->add_section( 'index_section_2' , array(
		    'title'      => 'Секция 2',
		    'panel' => 'index_panel'
		));
			$wp_customize->add_setting( 'index_section_2_title' , array(
				'default'    => 'Производим и реализуем',
				'transport' => 'postMessage',
			));
			$wp_customize->add_control('index_section_2_title', array(
				'label'      => 'Заголовок',
				'section'    => 'index_section_2',
				'type'       => 'text',
			));
			$wp_customize->selective_refresh->add_partial( 'index_section_2_title', array(
			    'selector' => '#index_section_2_edit_button',
			    'fallback_refresh'    => false
			) );
			$wp_customize->get_setting( 'index_section_2_title' )->transport = 'postMessage';
			
	$wp_customize->add_section( 'contact_inform' , array(
	    'title'      => 'Контактные данные'
	));
		$wp_customize->add_setting( 'contact_phone' , array(
			'default'    => '8 (908) 260 94 29',
			'transport'  => 'refresh',
		));
		$wp_customize->add_control('contact_phone', array(
			'label'      => 'Номер телефона',
			'section'    => 'contact_inform',
			'type'       => 'text'
		));
		$wp_customize->add_setting( 'contact_phone_second' , array(
			'default'    => '8 (908) 260 94 29',
			'transport'  => 'refresh',
		));
		$wp_customize->add_control('contact_phone_second', array(
			'label'      => 'Номер телефона 2',
			'section'    => 'contact_inform',
			'type'       => 'text'
		));
		$wp_customize->add_setting( 'contact_email' , array(
			'default'    => 'kirov-komi-srub@mail.r',
			'transport'  => 'refresh',
		));
		$wp_customize->add_control('contact_email', array(
			'label'      => 'Емаил',
			'section'    => 'contact_inform',
			'type'       => 'text'
		));
		$wp_customize->add_control('contact_phone_second', array(
			'label'      => 'Номер телефона 2',
			'section'    => 'contact_inform',
			'type'       => 'text'
		));
		$wp_customize->add_setting( 'place_id' , array(
			'default'    => 'ChIJie2iIKK46EMRvyXQl0VmTww',
			'transport'  => 'refresh',
		));
		$wp_customize->add_control('place_id', array(
			'label'      => 'Place ID',
			'section'    => 'contact_inform',
			'type'       => 'text'
		));
		$wp_customize->selective_refresh->add_partial( 'contact_email', array(
		    'selector' => '#contact_email_edit_button', // You can also select a css class
		) );
});

add_action('customize_preview_init',function(){
	wp_enqueue_script( 'scrrr',get_template_directory_uri() . '/customize/customizer.js', array('customize-preview') );
});
if(class_exists('Kirki')){
	Kirki::add_field( 'my_theme', array(
		'settings' => 'section_about_us_cards',
		'label'    => 'Cards',
		'section'  => 'index_section_about_us',
		'type'     => 'repeater',
		'row_label' => array(
			'type' => 'text',
			'value' => esc_attr__('your custom value', 'my_textdomain' ),
			'field' => 'text'
		),
		'fields' => array(
			'image' => array(
				'type'        => 'image',
				'label'       => 'Картинка',
				'description' => 'image',
				'default'     => 'http://magaz.ru/wp-content/uploads/2017/11/icon-2.png',
			),
			'text' => array(
				'label'       => 'Текст',
				'description' => 'text',
				'type'     => 'textarea',
				'sanitize_callback' => 'wp_kses_post',
				'default'     => 'Более 10 лет<br>
								  опыта работы<br>
								  и заготовки леса',
			),
		)
	));

	Kirki::add_field( 'my_theme', array(
		'settings' => 'section_2_cards',
		'label'    => 'Cards',
		'section'  => 'index_section_2',
		'type'     => 'repeater',
		'fields' => array(
			'image' => array(
				'type'        => 'image',
				'label'       => 'Картинка',
				'description' => 'image',
				'default'     => 'http://magaz.ru/wp-content/uploads/2017/11/icon-2.png',
			),
			'text' => array(
				'label'       => 'Текст',
				'description' => 'text',
				'type'     => 'textarea',
				'sanitize_callback' => 'wp_kses_post',
				'default'     => 'Имеем<br>
								богатую базу<br>
								материалов<br>
								и собственное<br>
								производство,<br>
								поэтому можем<br>
								предоставить любой<br>
								пиломатериал<br>
								для вас',
			),
			'title' => array(
				'label'       => 'Title',
				'description' => 'title',
				'type'     => 'textarea',
				'sanitize_callback' => 'wp_kses_post',
				'default'     => 'СРУБЫ<br>
								  РУЧНОЙ РУБКИ',
			),
			'link' => array(
				'label'       => 'Ссылка',
				'description' => 'ссылка',
				'type'     => 'link',
				'default'     => '#',
			),
		)
	));
}


?>