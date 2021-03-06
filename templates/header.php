<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/cupertino/jquery-ui.css" type="text/css" rel="stylesheet"/>
    <?
    $vpaths = W::filter('scripts', array());
    ?>
    <? foreach($vpaths as $vpath): ?>
      <script src="<?=$vpath?>" type="text/javascript"></script>
    <? endforeach; ?>
    <title><?=W::filter('window_title')?></title>
    <link href="<?=$config['vpath']?>/assets/css/style.css" type="text/css" rel="stylesheet"/>
    <? foreach(W::filter('css', array()) as $path): ?>
      <link href="<?=$path?>" type="text/css" rel="stylesheet"/>
    <? endforeach; ?>
  </head>
<body>
  <div class='widget'>
    <? W::action('render_widgets') ?>
  </div>
  <div class="clear"/>
 
  
<div class="nav">
  <div class="title"><a href="/"><?=W::filter('page_title')?></a></div>
  <div class="menu">
    <?
    $links = W::filter('nav_links', array());
    ?>
    <? if(count($links)>0): ?>
      <ul>
        <? foreach($links as $link): ?>
          <li class="<?= isset($link['class']) ? $link['class'] : '' ?>" style="<?= isset($link['style']) ? $link['style'] : '' ?>"><a href="<?=$link['href']?>" class="<?= isset($link['class']) ? $link['class'] : '' ?>" style="<?= isset($link['style']) ? $link['style'] : '' ?>" ><?=W::h($link['title'])?></a></li>
        <? endforeach; ?>
      </ul>
    <? endif; ?>
  </div>
  <br clear="both"/>
  <?
  $links = W::filter('subnav_links', array());
  ?>
  <? if(count($links)>0): ?>
    <div class="submenu authenticated">
      <ul>
        <? foreach($links as $link): ?>
          <li class="<?= isset($link['class']) ? $link['class'] : '' ?>" style="<?= isset($link['style']) ? $link['style'] : '' ?>"><a href="<?=$link['href']?>" class="<?= isset($link['class']) ? $link['class'] : '' ?>" style="<?= isset($link['style']) ? $link['style'] : '' ?>" ><?=W::h($link['title'])?></a></li>
        <? endforeach; ?>
      </ul>
    </div>
  <? endif; ?>
</div>
<div class='content'>
  <? W::action('before_content') ?>
  <? 
    $flashes = W::filter('flashes', array());
    if(count($flashes)>0): ?>
    <div class='flash'>
      <ul>
        <? foreach($flashes as $msg): ?>
          <?=W::h($msg)?><br/>
        <? endforeach ?>
      </ul>
    </div>
  <? endif; ?>
  <? 
    $errors = W::filter('errors', array());
    if(count($errors)>0): ?>
    <div class='error'>
      <ul>
        <? foreach(get_error() as $msg): ?>
          <?=W::h($msg)?><br/>
        <? endforeach ?>
      </ul>
    </div>
  <? endif; ?>
    <? $classes = W::filter('style_containers', array()); ?>
    <? foreach($classes as $c): ?>
      <? if(!$c) continue; ?>
      <div class="<?=$c?>_container">
    <? endforeach; ?>
