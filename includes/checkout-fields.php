<?php

defined('ABSPATH') || exit;

add_action('woocommerce_after_order_notes', 'test_hook');

// Hook funktionierte mit WooCommerce Checkout Seite nicht. So habe ich für den Test einen Shortcode verwendet: [woocommerce_checkout]

function test_hook($checkout) {
    echo '<div style="background:red;color:white;display:flex;justify-content:center;">Hook klappt auch</div>';
    echo '<h1>Hook hat funktioniert</h1>';
}

add_action('wp_footer', function () {
    echo '<div style="background:red;color:white;display:flex;justify-content:center;">Plugin wird ausgeführt</div>';
});