<?php
/**
 * Block Name: Text
 *
 * This is the template that displays the customised EoE Text Block
 */

$id = 'eoe-wide-columns-' . $block['id'];
$anchor = str_replace(' ', '-', strtolower(get_field('id')));
$columns = get_field('columns');

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<section id="<?php echo $anchor; ?>" class="eoe-block eoe-wide-columns <?php echo $id; ?>">
	<div class="container is-fluid" >
		<div class="columns is-centered">
		<?php
			// Check columns exists.
			if( $columns ):
				$first = true;
				foreach( $columns as $column ) {
					$title = $column['title'];
					$image = $column['image'];
					$text = $column['text'];
					$offset = $first ? '' : 'is-offset-1';
					echo '<div class="column rellax is-4 ' . $offset . '">';
						echo '<div class="col-header">';
							echo '<img src="' . $image . '" />';
							echo '<div class="col-title">';
								echo $title;
							echo '</div>';
						echo '</div>';
						echo $text;
					echo '</div>';
					$first = false;
				}
			endif;
		?>
		</div>
	</div>
	<div class="background"></div>
</section>
<style type="text/css">
	.<?php echo $id; ?> .background {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: -1;
		<?php
			$bg_color = get_field('background');
			$bg_img = get_field('background_image')['url'];
			if($bg_img):
				echo 'background-image: url("' . $bg_img .'");';
			endif;
			if( $bg_color ):
				echo 'background-color: ' . $bg_color .';';
			endif;
		?>
	}
</style>