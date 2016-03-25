<?php print render($title_prefix); ?>
<?php if ($header): ?>
<?php print $header; ?>
<?php endif; ?>
<?php if ($rows): ?>
<nav class="nav animated fadeInUp delay1">
	<div  class="container">
		<div class="row-fluid">
			<ul  id="menu">
			<?php print $rows; ?>
			</ul>
		</div>
	</div>
</nav>
<?php endif; ?>
