<?php
/**
 * Block Name: Text
 *
 * This is the template that displays the customised EoE Text Block
 */

$id = 'eoe-contact-' . $block['id'];
$anchor = str_replace(' ', '-', strtolower(get_field('id')));

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';


?>
<section id="<?php echo $anchor; ?>" class="eoe-block  eoe-contact <?php echo $id; ?>" >
	<div class="container is-fluid" >
		<div class="columns is-vcentered is-multiline">
			<div class="column  is-12 is-7-desktop is-offset-1-desktop">
				<img src="<?php echo get_template_directory_uri() ?>/static/eoe_animated.gif" alt="East of Everything Animation">
			</div>
			<div class="column is-8 is-offset-3 is-offset-2-desktop is-offset-3-widescreen">
				<h2><a href="<?php the_field('link'); ?>"><?php the_field('link'); ?></a><h2>
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