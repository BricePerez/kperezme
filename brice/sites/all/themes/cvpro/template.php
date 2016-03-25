<?php
global $base_url;

function cvpro_preprocess_html(&$variables) {

	//-- Your styles --
	$style_switcher = theme_get_setting('cvpro_style_switch', 'cvpro');
	if(empty($style_switcher))
		$style_switcher = 'on';
	if((!empty($style_switcher) && $style_switcher=='on')){
		drupal_add_html_head(array('#tag' => 'link', '#attributes' => array('href' => base_path().path_to_theme().'/css/style-dark.css','rel' => 'stylesheet','media' => 'screen','class' => 'style'),'#weight' => 0), 'style');
		//drupal_add_css(base_path().path_to_theme().'/css/style-dark.css', array('type' => 'external','media' => 'screen'));
		//Skins
		$setting_skin = theme_get_setting('built_in_skins', 'cvpro');
		if(!empty($setting_skin)){
			$skin_color = '/css/skins/'.$setting_skin;
		}else{
			$skin_color = '/css/skins/white/white.css';
		}
		$css_skin = array(
		'#tag' => 'link', // The #tag is the html tag - <link />
		'#attributes' => array( // Set up an array of attributes inside the tag
		'href' => base_path().path_to_theme().$skin_color,
		'rel' => 'stylesheet',
		'type' => 'text/css',
		'media' => 'screen',
		'class' => 'skin',
		),
		'#weight' => 1,
		);
		drupal_add_html_head($css_skin, 'skin');
			// Add css skin


	} else {
		drupal_add_html_head(array('#tag' => 'link', '#attributes' => array('href' => base_path().path_to_theme().'/css/style-light.css','rel' => 'stylesheet','media' => 'screen','class' => 'style'),'#weight' => 0), 'style');
		//drupal_add_css(base_path().path_to_theme().'/css/style-light.css', array('type' => 'external','media' => 'screen'));
		$setting_skin = theme_get_setting('built_in_skins', 'cvpro');
		if(!empty($setting_skin)){
			$skin_color = '/css/skins/'.$setting_skin;
		}else{
			$skin_color = '/css/skins/blue/blue.css';
		}
		$css_skin = array(
		'#tag' => 'link', // The #tag is the html tag - <link />
		'#attributes' => array( // Set up an array of attributes inside the tag
		'href' => base_path().path_to_theme().$skin_color,
		'rel' => 'stylesheet',
		'type' => 'text/css',
		'media' => 'screen',
		'class' => 'skin',
		),
		'#weight' => 1,
		);
		drupal_add_html_head($css_skin, 'skin');
	}


	//drupal_add_css(base_path().path_to_theme().'/css/skins/white/white.css', array('type' => 'external','media' => 'screen', 'class' => 'skin'));


	//update css
	drupal_add_css(base_path().path_to_theme().'/css/update.css', array('type' => 'external'));

	drupal_add_js('http://www.google.com/jsapi', array('type' => 'external', 'scope' => 'header'));
	//JQuery libs
	drupal_add_js(base_path().path_to_theme().'/js/jquery-1.8.3.min.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js('http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js', array('type' => 'external', 'scope' => 'footer'));

	//--Nav--
	drupal_add_js(base_path().path_to_theme().'/js/nav/tinynav.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js(base_path().path_to_theme().'/js/nav/jquery.sticky.js', array('type' => 'file', 'scope' => 'footer'));

	//--Ligbox--
	drupal_add_js(base_path().path_to_theme().'/js/fancybox/jquery.fancybox-1.3.1.js', array('type' => 'file', 'scope' => 'footer'));

	//--Scroll--
	drupal_add_js(base_path().path_to_theme().'/js/scroll/smooth-scroll.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js(base_path().path_to_theme().'/js/scrollbar/jquery.mCustomScrollbar.concat.min.js', array('type' => 'file', 'scope' => 'footer'));

	//Theme Options--
	drupal_add_js(base_path().path_to_theme().'/js/theme-options/theme-options.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js(base_path().path_to_theme().'/js/theme-options/jquery.cookies.js', array('type' => 'file', 'scope' => 'footer'));

	//Bootstrap
	drupal_add_js(base_path().path_to_theme().'/js/bootstrap/bootstrap.js', array('type' => 'file', 'scope' => 'footer'));
	//fUNCTIONS
	drupal_add_js(base_path().path_to_theme().'/js/jquery-func.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js(base_path().path_to_theme().'/js/update.js', array('type' => 'file', 'scope' => 'footer'));

}


function cvpro_form_comment_form_alter(&$form, &$form_state) {

	$form['comment_body']['#after_build'][] = 'cvpro_customize_comment_form';
	$form['your_comment']['subject'] = FALSE;
  	unset($form['subject']);
  	$form['your_comment']['subject']['#weight'] = -10;

  	$form['your_comment']['comment_body'] = $form['comment_body'];
  	unset($form['comment_body']);

  	$form['author']['mail']['#access'] = TRUE;
  	$form['author']['homepage']['#access'] = FALSE;
  	$form['author']['mail']['#required'] = TRUE;

}

function cvpro_customize_comment_form(&$form) {
  $form[LANGUAGE_NONE][0]['format']['#access'] = FALSE;
  return $form;
}

function cvpro_preprocess_page(&$vars) {

	if (isset($vars['node'])) {
		$vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
	}

	//404 page
	$status = drupal_get_http_header("status");
	if($status == "404 Not Found") {
		$vars['theme_hook_suggestions'][] = 'page__404';
	}


	if (isset($vars['node'])) :
		//print $vars['node']->type;
        if($vars['node']->type == 'page'):

            $node = node_load($vars['node']->nid);
            $output = field_view_field('node', $node, 'field_show_page_title', array('label' => 'hidden'));
            $vars['field_show_page_title'] = $output;
			//sidebar
			$output = field_view_field('node', $node, 'field_sidebar', array('label' => 'hidden'));
            $vars['field_sidebar'] = $output;
        endif;
    endif;


}


// Remove superfish css files.
function cvpro_css_alter(&$css) {
	unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);

//	unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
}

function cvpro_form_alter(&$form, &$form_state, $form_id) {
	if ($form_id == 'search_block_form') {
		$form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
		$form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
		$form['search_block_form']['#attributes']['id'] = array("mod-search-searchword");
		//disabled submit button
		//unset($form['actions']['submit']);
		unset($form['search_block_form']['#title']);
		$form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
		$form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
	}
	if($form_id == 'contact_site_form'){
		$form['mail']['#attributes']['class'] = array("input-contact-form");
		$form['name']['#attributes']['class'] = array("input-contact-form");
		$form['subject']['#attributes']['class'] = array("input-contact-form");
		$form['message']['#attributes']['class'] = array("message-contact-form");
		$form['actions']['submit']['#attributes']['class'] = array('btn btn-success contact-form-button');
	}
	if ($form_id == 'comment_form') {
		$form['comment_filter']['format'] = array(); // nuke wysiwyg from comments
	}
}
function cvpro_textarea($variables) {
  $element = $variables['element'];
  $element['#attributes']['name'] = $element['#name'];
  $element['#attributes']['id'] = $element['#id'];
  $element['#attributes']['cols'] = $element['#cols'];
  $element['#attributes']['rows'] = $element['#rows'];
  _form_set_class($element, array('form-textarea'));

  $wrapper_attributes = array(
    'class' => array('form-textarea-wrapper'),
  );

  // Add resizable behavior.
  if (!empty($element['#resizable'])) {
    $wrapper_attributes['class'][] = 'resizable';
  }

  $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
  $output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
  $output .= '</div>';
  return $output;
}
function cvpro_breadcrumb($variables) {
	$crumbs ='';
	$breadcrumb = $variables['breadcrumb'];
	if (!empty($breadcrumb)) {
		$crumbs .= '<ol class="breadcrumb">';
		foreach($breadcrumb as $value) {

			$crumbs .= '<li>'.$value.'</li>';
		}
		$crumbs .= '<li class="active"><a href="#">'.drupal_get_title().'</a></li>';
		$crumbs .= '</ol>';
		return $crumbs;
	}else{
		return NULL;
	}
}
//custom main menu
function cvpro_menu_tree__main_menu(array $variables) {
	if (preg_match("/\bmain-submenu\b/i", $variables['tree'])){
    return '<nav  id="menu" class="mainmenu navbar yamm navbar-default default" role="navigation"><ul id="nav" class="nav nav-tabs main-menu">' . $variables['tree'] . '</ul></nav>';
  } else {
    return '<ul class="main-submenu dropdown-menu">' . $variables['tree'] . '</ul>';
  }
}


/**Override Menu theme */
function cvpro_links__system_main_menu(array $variables) {
       $html = "<ul class='menu'>";
    foreach ($variables['links'] as $link) {
        $html .= "<li>".l($link['title'], $link['path'], $link)."</li>";
    }
    $html .= "</ul>";
    return $html;
}

function cvpro_menu_tree__menu_top_menu($variables) {
	$str = '';
	$str .= '<ul id="menuhlng2">';
		$str .= $variables['tree'];
	$str .= '</ul>';

	return $str;
}
function hook_preprocess_page(&$variables) {
       if (arg(0) == 'node' && is_numeric($nid)) {
    if (isset($variables['page']['content']['system_main']['nodes'][$nid])) {
      $variables['node_content'] =& $variables['page']['content']['system_main']['nodes'][$nid];
      if (empty($variables['node_content']['field_show_page_title'])) {
        $variables['node_content']['field_show_page_title'] = NULL;
      }
    }
  }
}

