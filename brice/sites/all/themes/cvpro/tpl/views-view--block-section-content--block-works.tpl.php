<?php print render($title_prefix); ?>
<?php if ($header): ?>
<?php print $header; ?>
<?php endif; ?>
<?php if ($rows): ?>
<div class="row-fluid">
	<?php print $rows; ?>
</div>
<?php endif; ?>

<?php if ($attachment_after): ?>
	<?php print $attachment_after; ?>
<?php endif; ?>