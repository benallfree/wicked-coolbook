    <? $classes = W::filter('style_containers', array()); ?>
    <? foreach($classes as $c): ?>
      <? if(!$c) continue; ?>
      </div>
    <? endforeach; ?>
  <br style="clear:both"/>
  <? W::action('after_content') ?>
</div>
<div class="footer">
  <? W::action('before_footer') ?>
  <?
  $links = W::filter('footer_links', array());
  ?>
  <? if(count($links)>0): ?>
    <ul>
      <? foreach($links as $link): ?>
        <li class="<?= isset($link['class']) ? $link['class'] : '' ?>" style="<?= isset($link['style']) ? $link['style'] : '' ?>">
          <? if(isset($link['href'])): ?>
            <a href="<?=$link['href']?>" class="<?= isset($link['class']) ? $link['class'] : '' ?>" style="<?= isset($link['style']) ? $link['style'] : '' ?>" >
          <? endif; ?>
          <?=W::h($link['title'])?>
          <? if(isset($link['href'])): ?>
            </a>
          <? endif; ?>
        </li>
      <? endforeach; ?>
    </ul>
  <? endif; ?>
  <br clear="both"/>
  <? W::action('after_footer') ?>
</div>
<script type="text/javascript">
  $(function () {
    $('.button').click(function() {
      e = $(this).parents('form');        
      if( $(this).attr('href')==undefined && e.length==0 ) return true;
      $(this).addClass('loading');
      $(this).html("Please wait...");
      $(this).off('click');
      if($(this).attr('href')!=undefined)
      {
        window.location=$(this).attr('href');
      } else {
        e.submit();
      }
    });

  });
</script>

</body>
</html>