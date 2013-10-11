<?php foreach ($arg2s as $arg2):?>
<li class="clickable" id = <?php echo $arg2;?> ><a href="#"><span class="badge pull-right"><?php echo count(${$arg2.'Docs'});?></span><?php echo $arg2;?></a></li>
<?php endforeach;?>