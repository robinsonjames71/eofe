<?php
/**
 * Block Name: Text
 *
 * This is the template that displays the customised EoE Text Block
 */

$id = 'eoe-text-' . $block['id'];
$anchor = str_replace(' ', '-', strtolower(get_field('id')));

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$blockTitle = get_field('block_title');
$centered = get_field('centered');


?>
<section id="<?php echo $anchor; ?>" class="eoe-block eoe-text <?php echo $id; ?>" >
	<div class="container is-fluid" >
		<div class="columns is-vcentered is-multiline <?= in_array('true', $centered) ? 'is-centered' : '' ?>">
			<div class="column block-title is-12 is-3-desktop has-text-centered-mobile has-text-centered-touch">
				<?= $blockTitle; ?>
			</div>
			<div class="column  is-12 is-10-desktop text <?= in_array('true', $centered) ? 'is-7-widescreen' : 'is-6-widescreen is-offset-2-desktop is-offset-4-widescreen' ?>">
				<?php the_field('text'); ?>
			</div>
		</div>
	</div>
	<div class="background"></div>
</section>
<style type="text/css">
	.<?php echo $id; ?> {
		<?php
			$bg_color = get_field('background');
			if( $bg_color ):
				echo 'background-color: ' . $bg_color .';';
			endif;
		?>
	}
	.<?php echo $id; ?> .background {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: -1;
		<?php
			$bg_img = get_field('background_image')['url'];
			if($bg_img):
				echo 'background-image: url("' . $bg_img .'");';
			endif;
		?>
	}
</style>