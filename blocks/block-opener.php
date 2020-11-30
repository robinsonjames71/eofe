<?php
/**
 * Block Name: Opening Animation
 *
 * This is the template that displays the testimonial block.
 */

// create id attribute for specific styling
$id = 'eoe-opener-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<div id="<?php echo $id; ?>" class="eoe-opener <?php echo $align_class; ?>">
  <div class="background"></div>
  <div class="path">
    <svg viewbox="0 0 600 400" width="100%" height="100%" preserveAspectRatio="none">
      <path d="M50,370 C358,316 500,300 530,120" width="100%" height="100%" id="path" opacity="0" background="black" fill="black" />
    </svg>
  </div>
  <div class="gps-animation">
    <div class="marker timeline-trigger"></div>
    <div class="marker start-trigger"></div>
    <div class="marker end-trigger"></div>
    <div class="text">
      <h1>
        <span class="latitude">28.6474</span>° S,
      </h1>
      <h1>
        <span class="longitude">153.6020</span>° E
      </h1>
    </div>

    <div class="gps-button">
      <svg width="69px" height="69px" viewBox="0 0 69 69">
          <title>button</title>
          <g id="gps-button" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="eoe" transform="translate(-358.000000, -910.000000)">
                  <g id="button-paths" transform="translate(363.000000, 915.000000)">
                      <path d="M29.3499,39.1992 C34.9349,39.1992 39.4619,34.6722 39.4619,29.0882 C39.4619,23.5032 34.9349,18.9752 29.3499,18.9752 C23.7649,18.9752 19.2379,23.5032 19.2379,29.0882 C19.2379,34.6722 23.7649,39.1992 29.3499,39.1992" id="Fill-3" fill="#9B1D23"></path>
                      <path d="M29.3499,57.4443 C45.0109,57.4443 57.7069,44.7493 57.7069,29.0883 C57.7069,13.4263 45.0109,0.7303 29.3499,0.7303 C13.6889,0.7303 0.9929,13.4263 0.9929,29.0883 C0.9929,44.7493 13.6889,57.4443 29.3499,57.4443 Z" id="Stroke-5" stroke="#9B1D23" stroke-width="11.451"></path>
                  </g>
              </g>
          </g>
      </svg>
    </div>
  </div>
  <div class="eoe-animation-placeholder"></div>
  <div class="eoe-animation">
    <h2>The <em>place</em> your brand should live.</h2>
    <div class="eoe-animation-inner">
      <img src="<?php echo get_template_directory_uri() ?>/static/eoe_animated.gif" alt="East of Everything Animation">
    </div>
  </div>
  <style type="text/css">
    #<?php echo $id; ?> {
    }
  
    .eoe-opener .background {
      /* The image used */
      background-image: url("<?php echo get_template_directory_uri() ?>/static/map-background.png");
    }
  </style>
</div>
