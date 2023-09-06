<?php

/*
  Plugin Name: Quiz Gutenberg Block
  Description: Give your readers a multiple choice question
  Version: 1.0
  Author: Bartek
*/

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

class AreYouPayingAttention {
  // Constructor function
  function __construct() {
    add_action('init', array($this, 'adminAssets'));
  }

  // Register block assets
  function adminAssets() {
    register_block_type(__DIR__, array(
      'render_callback' => array($this, 'theHTML')
    ));
  }

  // Generate the HTML for the block
  function theHTML($attributes) {
    ob_start();
    ?>
      <!-- Output block attributes as JSON  -->
      <div class="paying-attention-update-me">
        <pre style="display: none;"><?php echo wp_json_encode($attributes) ?></pre>
      </div>
    <?php
    return ob_get_clean();
  }
}

$areYouPayingAttention = new AreYouPayingAttention();
