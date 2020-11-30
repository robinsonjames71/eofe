<?php
/**
 * Block Name: Text
 *
 * This is the template that displays the customised EoE Text Block
 */

$id = 'eoe-column-' . $block['id'];
$anchor = str_replace(' ', '-', strtolower(get_field('id')));
$columns = get_field('columns');

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<section id="<?php echo $anchor; ?>" class="section fp-auto-height eoe-block eoe-columns <?php echo $id; ?>">
	<div class="background fp-bg"></div>
	<div class="container is-fluid" >
		<div class="columns is-centered">
		<?php
			// Check columns exists.
			if( $columns ):
				$first = true;
				$count = 0;
				foreach( $columns as $column ) {
					$title = $column['title'];
					$image = $column['image'];
					$text = $column['text'];
					$offset = $first ? '' : 'is-offset-1-desktop';
					$rellaxSpeed = ($count * -0.5) + -2;
					echo '<div class="column rellax is-4-tablet is-3-desktop ' . $offset . '" data-rellax-speed="' . $rellaxSpeed . '">';
						echo '<div class="col-header">';
							echo '<img src="' . $image . '" />';
							echo '<div class="col-title">';
								echo $title;
							echo '</div>';
						echo '</div>';
						echo $text;
					echo '</div>';
					$first = false;
					$count++;
				}
			endif;
		?>
		</div>
	</div>
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
		.eoe-columns .col-header {
			position: relative;
			text-align: center;
			margin-bottom: 10px;
		}
		.eoe-columns .col-header img {
			max-width: 50%;
		}
		@media only screen and (min-width: 768px) {
			.eoe-columns .col-header img {
				max-width: 80%;
			}
		}
		@media only screen and (min-width: 1024px) {
			.eoe-columns .col-header img {
				max-width: 50%;
			}
			.eoe-columns .col-header {
				display: flex;
				align-items: center;
				margin-bottom: 20px;
				text-align: left;
			}
			.eoe-columns .col-title {
				margin-left: 10px;
			}
		}
	</style>
</section>