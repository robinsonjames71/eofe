<?php
/**
 * Block Name: Text
 *
 * This is the template that displays the customised EoE Text Block
 */

$id = 'eoe-column-' . $block['id'];
$anchor = str_replace(' ', '-', strtolower(get_field('id')));
$grid = get_field('grid');
$blockTitle = get_field('block_title');
$count = count($grid);

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<section id="<?php echo $anchor; ?>" class="eoe-block eoe-text-grid <?php echo $id; ?>">
	<div class="container is-fluid" >
		<div class="columns is-multiline">
			<div class="column is-12 is-3-desktop block-title">
				<?= $blockTitle; ?>
			</div>
			<div class="column <?= $count > 4 ? 'is-9-desktop' : 'is-6-desktop is-offset-2-desktop' ?>">
				<div class="grid">
					<?php
						// Check grid exists.
						if( $grid ):
							$first = true;
							$count = 0;
							foreach( $grid as $cell ) {
								$image = $cell['image'];
								$title = $cell['title'];
								$text = $cell['text'];
								$rellaxSpeed = ($count * -0.2) + -2;
								echo '<div class="cell rellax" data-rellax-speed="' . $rellaxSpeed . '">';
									echo '<div class="cell-inner">';
										echo '<div class="col-header">';
											echo '<img src="' . $image . '" />';
											echo '<div class="col-title">';
												echo $title;
											echo '</div>';
										echo '</div>';
										echo $text;
									echo '</div>';
								echo '</div>';
								$first = false;
								$count++;
							}
						endif;
					?>
				</div>
			</div>
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
	.eoe-text-grid .block-title {
		margin-bottom: 50px;
	}
	.eoe-text-grid .cell-inner {
		border-left: 1px dashed black;
		padding-left: 25px;
		padding-right: 25px;
	}
	.eoe-text-grid .col-header {
		position: relative;
		text-align: center;
		margin-bottom: 10px;
	}
	.eoe-text-grid .col-header {
		display: flex;
		align-items: center;
		margin-bottom: 20px;
		text-align: left;
	}
	.eoe-text-grid .col-title {
		margin-left: 10px;
		text-decoration: underline;
	}
	.eoe-text-grid .cell {
		margin-bottom: 50px;
	}
	@media only screen and (min-width: 768px) {
		.eoe-text-grid .grid {
			display: flex;
			flex-wrap: wrap;
		}
		.eoe-text-grid .cell {
			flex-basis: 50%;
		}
	}
	@media only screen and (min-width: 1024px) {
		.<?php echo $id; ?>.eoe-text-grid .cell {
			flex-basis: <?= $count > 4 ? '33%' : '50%' ?>;
		}
		.eoe-text-grid .cell {
			margin-bottom: 100px;
		}
		.eoe-text-grid .col-header img {
			max-width: 50%;
		}
	}
</style>