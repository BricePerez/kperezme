<?php include("header.tpl.php") ?>

<?php  if($page['content']):?>
<section class="info_area">
	<div class="container">
		<?php print $messages; ?>
		<div class="row-fluid">
		<?php  if($page['content']):?>
			<div class="span9">
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
<?php endif; ?>

<?php include ("footer.tpl.php") ?>