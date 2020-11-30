<?php
/**
 * Block Name: Text
 *
 * This is the template that displays the customised EoE Text Block
 */

$id = 'eoe-logos-' . $block['id'];
$anchor = str_replace(' ', '-', strtolower(get_field('id')));
$logos = get_field('logos');

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<section id="<?php echo $anchor; ?>" class="eoe-block eoe-logos rellax <?php echo $id; ?>">
	<div class="container is-fluid" >
		<div class="columns is-centered">
			<div class="column is-9 rellax">
				<div class="logos-container">
					<?php
						// Check columns exists.
						if( $logos ):
							foreach( $logos as $logo ) {
								$image = $logo['image'];
								echo '<img src="' . $image . '" />';
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
	.eoe-logos .logos-container {
		display: grid;
		grid-template-columns: repeat(6, 1fr);
		grid-gap: 30px 50px;
		align-items: center;
		justify-items: center;
	}
	@media only screen and (max-width: 768px) {
		.eoe-logos .logos-container {
			grid-template-columns: repeat(3, 1fr);
		}
	}
</style>