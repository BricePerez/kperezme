<div class="row-fluid comment">
  <div class="span3">
    <div class="image-visitor">
    <?php if($picture){
			print $picture;
		}  else {
			print '<img src="http://www.taugamma.info/images/icons/avatar_male.png" alt="Default User Picture" />';
		}
		?>
    </div>
  </div>
  <div class="span9">
    <div class="title_comment">
      <span><?php print theme('username', array('account' => $content['comment_body']['#object'], 'attributes' => array('class' => 'url'))) ?></span>
      <span><?php print format_date($node->created, 'custom', 'l, d, M Y H:i');?></span>
      <span><?php print strip_tags(render($content['links']),'<a>'); ?></span>
    </div>
    <p><?php hide($content['links']); print render($content) ?></p>
  </div>
</div>