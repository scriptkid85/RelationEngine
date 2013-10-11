<?php foreach ($arg2s as $arg2):?>
	<div class= <?php echo "\"list-group hide {$arg2}-docs\"" ?>>
	    <a>
	    	<?php foreach (${$arg2.'Docs'} as $doc):?>
				<div class="well well-lg">
					<a href="#" class="list-group-item ">
					    <h4 class="list-group-item-heading"><?php echo $doc ?></h4>
					    <p class="list-group-item-text">address here</p>
					</a>
				</div>
	        <!-- <li><a href="#"><?php echo $doc ?></a></li> -->
	        <?php endforeach;?>
	    </ul>
	</div>
<?php endforeach;?>