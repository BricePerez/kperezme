<?php
	if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>
		<h4><?php print t('Comments').' ('.$content['#node']->comment_count.')';?></h4>
		<?php print render($content['comments']); ?>
		<?php print str_replace('resizable', '', render($content['comment_form'])); ?>
		<?php
	}
?>