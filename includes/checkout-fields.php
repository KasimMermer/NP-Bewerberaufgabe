<?php

defined('ABSPATH') || exit;

// Hook funktionierte mit WooCommerce Checkout Seite nicht. So habe ich für den Test einen Shortcode verwendet: [woocommerce_checkout]

/* Verwendete Dokumentation: https://developer.woocommerce.com/docs/code-snippets/customising-checkout-fields
für "woocommerce_form_field"
https://woocommerce.github.io/code-reference/hooks/hooks.html
für "woocommerce_after_order_notes", 
für "woocommerce_cart_calculate_fees" 
und "woocommerce_checkout_update_order_review" */

add_action('woocommerce_after_order_notes', 'mermer_add_gift_card_text_area_field');
add_action('woocommerce_after_order_notes', 'mermer_gift_wrapping_checkbox_field');
add_action('woocommerce_cart_calculate_fees', 'mermer_add_gift_wrapping_fee');
add_action('woocommerce_checkout_update_order_review', 'mermer_update_gift_wrapping_session');

// Funktion zum Hinzufügen des Textbereichs für den Geschenkkartentext
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

// Funktion zum Hinzufügen des Kontrollkästchens für die Geschenkverpackung
function mermer_gift_wrapping_checkbox_field($checkout) {
    woocommerce_form_field('mermer_gift_wrapping_checkbox', array(
        'type' => 'checkbox',
        'label' => 'Geschenkverpackung hinzufügen',     /* TODO: Wenn Checkbox aktiv ist, soll direkt unterhalb eine 
                                                        kurze Info erscheinen: „Geschenkverpackung wird mit 4,99 € berechnet.“ */
        'required' => false,
    ), $checkout->get_value('mermer_gift_wrapping_checkbox'));
}

// Funktion zum Aktualisieren der Sitzung basierend auf dem Kontrollkästchen
function mermer_update_gift_wrapping_session($posted_data) {
    /* Hier habe ich Hilfe von ChatGPT bekommen, da meine Lösung beim Seitenaktualisierung die Gebühren ebenfalls hinzufügte, 
    obwohl das Kästchen nicht angekreuzt war. */
    parse_str($posted_data, $output);

    if (isset($output['mermer_gift_wrapping_checkbox'])) {
        WC()->session->set('mermer_gift_wrapping', true);
    } else {
        WC()->session->set('mermer_gift_wrapping', false);
    }
}

// Funktion zum Hinzufügen der Gebühr für die Geschenkverpackung
function mermer_add_gift_wrapping_fee($cart) {
    // Lösung aus: https://stackoverflow.com/questions/77784479/custom-checkbox-in-woocommerce-admin-edit-product-for-a-payment-fee-calculation
    if(WC()->session->get('mermer_gift_wrapping')) {
        $cart->add_fee('Geschenkverpackung', 4.99);
    }
}