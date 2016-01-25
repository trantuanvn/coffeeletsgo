<?php
	//post tags
	$posttags = get_the_tags();
	$tagCount = count($posttags);
	$counter=1;
?>
<?php if ($posttags) { ?>
	<span class="meta-tag">
		<i class="fa fa-tags"></i>
		<?php	
			  foreach($posttags as $tag) {
				echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name . '</a>'; 
				if($counter!=$tagCount) echo ", ";
				$counter++;
			  }

		?>

	</span>


<?php } ?>