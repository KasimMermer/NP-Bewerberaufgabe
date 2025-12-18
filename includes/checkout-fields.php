<?php

defined('ABSPATH') || exit;

// Hook funktionierte mit WooCommerce Checkout Seite nicht. So habe ich für den Test einen Shortcode verwendet: [woocommerce_checkout]

/* Verwendete Dokumentation: https://developer.woocommerce.com/docs/code-snippets/customising-checkout-fields
für "woocommerce_form_field"
https://woocommerce.github.io/code-reference/hooks/hooks.html
für "woocommerce_after_order_notes" */

add_action('woocommerce_after_order_notes', 'mermer_add_gift_card_text_area_field');

function mermer_add_gift_card_text_area_field($checkout) {
    woocommerce_form_field('mermer_gift_card_text_field', array(
        'type' => 'textarea',
        'label' => 'Geschenkkartentext',
        'placeholder' => 'Geben Sie hier Ihren Geschenkkartentext ein',
        'required' => false,
        'custom_attributes' => array(
            'maxlength' => '500',
        ),
    ), $checkout->get_value('mermer_gift_card_text_field'));
}








add_action('woocommerce_after_order_notes', 'test_hook');

function test_hook($checkout) {
    echo '<div style="background:red;color:white;display:flex;justify-content:center;">Hook klappt auch</div>';
    echo '<h1>Hook hat funktioniert</h1>';
}

add_action('wp_footer', function () {
    echo '<div style="background:red;color:white;display:flex;justify-content:center;">Plugin wird ausgeführt</div>';
});