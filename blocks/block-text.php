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

$post = get_post();
if ( has_blocks( $post->post_content ) ) {
	$blocks = parse_blocks( $post->post_content );
	$order = array_map('getorder', $blocks);
}
$blockIndex = array_search($block['id'], $order);

?>
<section id="<?php echo $anchor; ?>" class="eoe-block rellax eoe-text <?php echo $id; ?>" data-rellax-zindex="<?= $blockIndex; ?>" data-rellax-speed="<?= $blockIndex; ?>">
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
	.eoe-text .text * + * {
		margin-top: 20px;
	}
	.eoe-text .text p + p {
		margin-top: 10px;
	}
	.eoe-text p {
		font-size: 18px;
	}
	.eoe-text .columns {
		position: relative;
	}
	@media only screen and (min-width: 768px) {
		.eoe-text p {
			font-size: 24px;
		}
	}
	@media only screen and (min-width: 1024px) {
		.eoe-text .block-title {
			position: absolute;
			top: 0;
			left: 0;
		}
	}
</style>