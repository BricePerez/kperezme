<?php
$out = '';
if($block->region == 'sections' || $block->region == 'sections_end'){
	$out .= '<section class="info_area '.$classes.'" id="'.$block->block_id.'" '.$attributes.'>';
	$out .= '<div class="container">';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= ' <div class="title_section"><h1>'.$block->subject.'<span class="arrow_title"></span></h1>';
		$out .= '<small>'.$block->block_description.'</small></div>';
		endif;
	$out .= $content;
	$out .= '</div></section>';

}elseif($block->region == 'content'){
	$out .= '<div class="'.$classes.'" '.$attributes.'>';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= ' <div class="title_section"><h1>'.$block->subject.'<span class="arrow_title"></span></h1>';
		$out .= '<small>'.$block->block_description.'</small></div>';
	endif;
	$out .= $content;
	$out .= '</div>';

}elseif($block->region == 'content_header'){
	$out .= '<div class="title_section '.$classes.'" '.$attributes.'>';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= ' <div class="title_section"><h1>'.$block->subject.'<span class="arrow_title"></span></h1>';
		$out .= '<small>'.$block->block_description.'</small></div>';
	endif;
	$out .= '</div>';

}elseif($block->region == 'sidebar_second'){
	$out .= '<aside class="'.$classes.'" '.$attributes.' >';
	$out .= render($title_suffix);
   if ($block->subject)
		$out .= '<h4>'.$block->subject.'</h4>';
	$out .= $content;
	$out .= '</aside>';


}else{
	$out .= '<div id="'.$block_html_id.'" class="'.$classes.'" '.$attributes.'>';
	$out .= render($title_suffix);
	$out .= $content;
	$out .= '</div>';
}
print $out;
?>