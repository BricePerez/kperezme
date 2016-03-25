<?php
/**
 * @file
 * Default theme implementation to display a node.
 */
global $base_root, $base_url;

  $style = 'large'; //image style
  if($node->field_image){
  $imageone = $node->field_image['und'][0]['uri'];
  }else{
  $imageone = '';
  }

  if(!$page){ ?>

  <div class="row-fluid post">
    <div class="span5 image_post">
      <?php print theme('image', array('path' => $imageone, 'style_name' => '', 'attributes'=>array('alt'=>$title)));?>
    </div>
    <div class="span7">
      <a href="<?php print $node_url; ?>"><h3><?php print $title; ?></h3></a>
      <ul class="meta">
        <li><?php print t('Posted by:') ;?> </li>
        <li class="author"><?php print strip_tags($name) ?></li>
        <li class="comments-numb"><a href="<?php print $node_url; ?>"><?php print $comment_count.' '.t('comments') ?> </a></li>
      </ul>
      <?php
        hide($content['comments']);
        hide($content['links']);
        hide($content['field_tags']);
        hide($content['field_image']);
        hide($content['field_categories']);
        print render($content);
      ?>
      <a href="<?php print $node_url; ?>" class="button"><?php print t('Read More'); ?></a>
    </div>
  </div>
  <?php
  } else {
  ?>
  <div class="post single">
    <a href="<?php print $node_url; ?>">
      <h1><?php print $title;?></h1>
    </a>
    <ul class="meta">
      <li><?php print t('Posted by') ?>:</li>
      <li class="author"><?php print $name ?></li>
      <li class="comments-numb"><a href="<?php print $node_url; ?>"><?php print $comment_count; ?> <?php print t('comments') ?></a></li>
    </ul>
    <?php if($node->field_image): ?>
    <div class="row-fluid image_post">
      <?php print theme('image', array('path' => $imageone, 'attributes'=>array('alt'=>$title)));?>
    </div>
    <?php endif; ?>
    <div class="row-fluid">
    <?php
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      hide($content['field_image']);
      hide($content['field_categories']);
      print render($content);
    ?>
    </div>
  </div>

    <?php print render($content['comments']);?>
  <!-- End main content -->
  <?php
  }


?>