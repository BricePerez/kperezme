<?php print render($title_prefix); ?>
<?php if ($header): ?>
<?php print $header; ?>
<?php endif; ?>
<div class="row-fluid">
<?php if ($rows): ?>
	<?php print $rows; ?>
<?php endif; ?>

<?php if ($attachment_after): ?>
	<?php print $attachment_after; ?>
<?php endif; ?>
</div>

