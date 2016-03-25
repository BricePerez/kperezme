<footer>
	<?php $footer_copyright = theme_get_setting('footer_copyright_message', 'cvpro'); ?>
	<?php if(!empty($footer_copyright)) :?>
		<h6><?php print $footer_copyright ?></h6>
	<?php endif; ?>
</footer>