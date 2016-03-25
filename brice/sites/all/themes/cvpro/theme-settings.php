<?php

function cvpro_form_system_theme_settings_alter(&$form, $form_state) {

  $theme_path = drupal_get_path('theme', 'cvpro');
  $form['settings'] = array(
      '#type' => 'vertical_tabs',
      '#title' => t('Theme settings'),
      '#weight' => 2,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
	  '#attached' => array(
					'css' => array(drupal_get_path('theme', 'cvpro') . '/css/drupalet_base/admin.css'),
					'js' => array(
						drupal_get_path('theme', 'cvpro') . '/js/drupalet_admin/admin.js',
					),
			),
  );

  $form['settings']['general_setting'] = array(
      '#type' => 'fieldset',
      '#title' => t('General Settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['general_setting']['general_setting_tracking_code'] = array(
      '#type' => 'textarea',
      '#title' => t('Tracking Code 1'),
      '#default_value' => theme_get_setting('general_setting_tracking_code', 'cvpro'),
  );


   $form['settings']['header'] = array(
      '#type' => 'fieldset',
      '#title' => t('Header settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

   $form['settings']['header']['text_logo'] = array(
      '#type' => 'textfield',
      '#title' => t('Logo text replace logo image'),
      '#default_value' => theme_get_setting('text_logo', 'cvpro'),
  );

  $form['settings']['footer'] = array(
      '#type' => 'fieldset',
      '#title' => t('Footer settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['footer']['footer_copyright_message'] = array(
      '#type' => 'textarea',
      '#title' => t('Footer copyright message'),
      '#default_value' => theme_get_setting('footer_copyright_message', 'cvpro'),
  );


	$form['settings']['custom_css'] = array(
		  '#type' => 'fieldset',
		  '#title' => t('Custom CSS'),
		  '#collapsible' => TRUE,
		  '#collapsed' => FALSE,
	  );

	$form['settings']['custom_css']['custom_css'] = array(
		  '#type' => 'textarea',
		  '#title' => t('Custom CSS'),
		  '#default_value' => theme_get_setting('custom_css', 'cvpro'),
		  '#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
	  );

  $form['settings']['background'] = array(
      '#type' => 'fieldset',
      '#title' => t('Background'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    );


  $form['settings']['background']['background_dark'] = array(
      '#type' => 'radios',
    '#title' => t('Background for Dark theme'),
    '#options' => array(
        'dark/bg-theme/1.png' => t('Background 1'),
        'dark/bg-theme/2.png' => t('Background 2'),
        'dark/bg-theme/3.png' => t('Background 3'),
        'dark/bg-theme/4.png' => t('Background 4'),
        'dark/bg-theme/5.png' => t('Background 5'),
        'dark/bg-theme/6.png' => t('Background 6'),
        'dark/bg-theme/7.png' => t('Background 7'),
        'dark/bg-theme/8.png' => t('Background 8'),
        'dark/bg-theme/9.png' => t('Background 9'),
        'dark/bg-theme/10.gif' => t('Background 10'),
        'dark/bg-theme/11.jpg' => t('Background 11'),
        'dark/bg-theme/default.jpg' => t('Background Default'),

    ),

    '#default_value' => theme_get_setting('background_dark','cvpro')
  );

  $form['settings']['background']['background_light'] = array(
      '#type' => 'radios',
    '#title' => t('Background for Light theme'),
    '#options' => array(
        'light/bg-theme/1.png' => t('Background 1'),
        'light/bg-theme/2.png' => t('Background 2'),
        'light/bg-theme/3.png' => t('Background 3'),
        'light/bg-theme/4.png' => t('Background 4'),
        'light/bg-theme/5.png' => t('Background 5'),
        'light/bg-theme/6.png' => t('Background 6'),
        'light/bg-theme/7.png' => t('Background 7'),
        'light/bg-theme/8.png' => t('Background 8'),
        'light/bg-theme/9.png' => t('Background 9'),
        'light/bg-theme/10.png' => t('Background 10'),
        'light/bg-theme/11.png' => t('Background 11'),
        'light/bg-theme/default.jpg' => t('Background Default'),

    ),

    '#default_value' => theme_get_setting('background_light','cvpro')
  );


  $form['settings']['skin'] = array(

        '#type' => 'fieldset',

        '#title' => t('Switcher Style'),

        '#collapsible' => TRUE,

        '#collapsed' => FALSE,

    );


  //Disable Switcher style front end;

  $form['settings']['skin']['cvpro_disable_switch'] = array(

      '#title' => t('Switcher style'),

      '#type' => 'select',

      '#options' => array('on' => t('ON'), 'off' => t('OFF')),

      '#default_value' => theme_get_setting('cvpro_disable_switch', 'cvpro'),
      '#description'  => t('Disable Switcher style front end')

  );

  $form['settings']['skin']['cvpro_style_switch'] = array(

      '#title' => t('Switcher Theme style'),

      '#type' => 'select',

      '#options' => array('on' => t('Dark'), 'off' => t('Light')),

      '#default_value' => theme_get_setting('cvpro_style_switch', 'cvpro'),

  );
  $form['settings']['skin']['built_in_skins'] = array(
      '#type' => 'radios',
    '#title' => t('Built-in Skins'),
    '#options' => array(
        'white/white.css' => t('White default for Dark'),
        'black/black.css' => t('Black'),
        'green/green.css' => t('Green'),
        'orange/orange.css' => t('Orange'),
        'derki/derki.css' => t('Derki'),
        'blue/blue.css' => t('Blue default for Light'),
        'red/red.css' => t('Red'),

    ),

    '#default_value' => theme_get_setting('built_in_skins','cvpro')
  );

}

