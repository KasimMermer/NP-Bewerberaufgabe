<?php

defined('ABSPATH') || exit;

/* Youtube Tutorial für "woocommerce_email_order_meta" gekommen: https://www.youtube.com/watch?v=dTD7nnjY7lo */

add_action('woocommerce_email_order_meta', 'mermer_add_gift_card_text_area_and_gift_wrapping_to_emails', 10, 3);

function mermer_add_gift_card_text_area_and_gift_wrapping_to_emails($order, $sent_to_admin, $plain_text) {
    $gift_text = $order->get_meta('mermer_gift_card_text_field');
    $gift_wrapping_checkbox = $order->get_meta('mermer_gift_wrapping_checkbox');

    if (!empty($gift_text)) {
        echo '<h3>' . __('Geschenkkartentext', 'text-language') . ':</h3>';
        echo '<p>' . esc_html($gift_text) . '</p>';
    }

    echo '<h3>' . __('Geschenkverpackung', 'text-language') . ':</h3>';
    echo '<p>' . ($gift_wrapping_checkbox === '1' ? __('Ja', 'text-language') : __('Nein', 'text-language')) . '</p>';
}