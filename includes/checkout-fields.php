<?php

defined('ABSPATH') || exit;

// Hook funktionierte mit WooCommerce Checkout Seite nicht. So habe ich für den Test einen Shortcode verwendet: [woocommerce_checkout]

/* Verwendete Dokumentation: https://developer.woocommerce.com/docs/code-snippets/customising-checkout-fields
für "woocommerce_form_field"
https://woocommerce.github.io/code-reference/hooks/hooks.html
für "woocommerce_after_order_notes" 
und für "woocommerce_cart_calculate_fees" */

add_action('woocommerce_after_order_notes', 'mermer_add_gift_card_text_area_field');
add_action('woocommerce_after_order_notes', 'mermer_gift_wrapping_checkbox_field');
add_action('woocommerce_cart_calculate_fees', 'mermer_add_gift_wrapping_fee');

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

function mermer_gift_wrapping_checkbox_field($checkout) {
    woocommerce_form_field('mermer_gift_wrapping_checkbox', array(
        'type' => 'checkbox',
        'label' => 'Geschenkverpackung hinzufügen (+4,99 €)',
        'required' => false,
    ), $checkout->get_value('mermer_gift_wrapping_checkbox'));
}

function mermer_add_gift_wrapping_fee($cart) {
 
}