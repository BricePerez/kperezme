<?php include("header.tpl.php") ?>

<?php  if($page['sections']):?>
<?php print $messages; ?>
<?php print render($page['sections']) ?>
<?php endif; ?>
<!-- Info Area -->
<section class="info_area" id="blog">
	<div class="container">
		<?php  if($page['content_header']):?>
		<?php print render($page['content_header']) ?>
		<?php endif; ?>
		<div class="row-fluid">
		<?php  if($page['content']):?>
			<div class="span9">
			<?php unset($page['content']['system_main']['default_message']); ?>
			<?php print render($page['content']) ?>
			</div>
		<?php endif; ?>
		<?php  if($page['sidebar_second']):?>
			<div class="span3">
			<?php print render($page['sidebar_second']) ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
</section>
 <!-- End Section Area -->

<?php  if($page['sections_end']):?>
<?php print render($page['sections_end']) ?>
<?php endif; ?>

<?php include ("footer.tpl.php") ?>