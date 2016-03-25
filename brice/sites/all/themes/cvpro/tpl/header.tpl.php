<?php
    global $base_url;
    $skin_switcher = theme_get_setting('cvpro_disable_switch', 'cvpro');
    if(empty($skin_switcher))
        $skin_switcher = 'on';
    if((!empty($skin_switcher) && $skin_switcher=='on')){
?>

<!-- Theme-options -->
<div id="theme-options">
    <div class="title">Theme Options<span title="Theme Options"><i class="icon-cogs right"></i></span></div>
    <span>COLORS SKINS</span>
    <ul id="colorchanger">
        <?php
            $style_switcher = theme_get_setting('cvpro_style_switch', 'cvpro');
            if(empty($style_switcher))
                $style_switcher = 'on';
            if(!empty($style_switcher) && $style_switcher=='on'){
         ?>
        <li><a class="colorbox white" href="?theme=white"></a></li>
        <?php } else { ?>
        <li><a class="colorbox black" href="?theme=black"></a></li>
        <?php } ?>
        <li><a class="colorbox red" href="?theme=red"></a></li>
        <li><a class="colorbox blue" href="?theme=blue"></a></li>
        <li><a class="colorbox orange" href="?theme=orange"></a></li>
        <li><a class="colorbox green" href="?theme=green"></a></li>
        <li><a class="colorbox derki" href="?theme=derki"></a></li>
    </ul>
    <span>PAGE COLOR</span>
    <ul id="layout">
        <li><a class="colorbox light" href="?theme=light">Light</a></li>
        <li title="active" class="dark"><a class="colorbox dark"href="?theme=dark" >Dark</a></li>
    </ul>
    <span>BACKGROUND BODY</span>
    <ul class="backgrounds">
        <li class="default" title="None - Default"></li>
        <li class="bg1"></li>
        <li class="bg2"></li>
        <li class="bg3"></li>
        <li class="bg4 "></li>
        <li class="bg5"></li>
        <li class="bg6"></li>
        <li class="bg7"></li>
        <li class="bg8"></li>
        <li class="bg9 "></li>
        <li class="bg10"></li>
        <li class="bg11"></li>
    </ul>
</div>
<!-- End Theme-options -->
<?php } ?>
<!-- Logo -->
<header class="logo animated fadeInDown delay1" id="about">
    <div class="container">
        <div class="row-fluid">
            <div class="title_logo">
                <?php
                if (theme_get_setting('text_logo', 'cvpro') !="" ){?>
                <h1><a href="<?php print check_url($front_page); ?>"> <?php print theme_get_setting('text_logo', 'cvpro'); ?> </a><small><?php if ($site_slogan) print $site_slogan; ?></small></h1>
                <?php }
                elseif($logo){
                ?>
                <h1><a href="<?php print check_url($front_page); ?>" title="<?php print $site_name; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" /></a><small><?php if ($site_slogan) print $site_slogan; ?></small></h1>
                <?php }?>
            </div>
        </div>
    </div>
</header>
<!-- End Logo -->

<!-- Nav-->
<?php  if($page['main_menu']):?>
<?php print render($page['main_menu']) ?>
<?php endif; ?>
<!-- End Nav-->