<?

W::register_filter('header', function($content) {
  $config = W::$modules['coolbook'];
  ob_start();
  require(dirname(__FILE__).'/templates/header.php');
  $s = ob_get_clean();
  return $s.$content;
});

W::register_filter('footer', function($content) {
  $config = W::$modules['coolbook'];
  ob_start();
  require(dirname(__FILE__).'/templates/footer.php');
  $s = ob_get_clean();
  return $content.$s;
});
