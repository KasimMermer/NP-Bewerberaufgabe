<?php

defined('ABSPATH') || exit;

/* 
Youtube Tutorial für "woocommerce_admin_order_data_after_billing_address" gekommen: https://www.youtube.com/watch?v=jGOYhWKH_Vk 
ChatGPT gab mir die Lösung für die Anzeige beim Kunden: "woocommerce_order_details_after_customer_details"
*/

add_action('woocommerce_admin_order_data_after_billing_address', 'mermer_show_gift_card_text_area_and_gift_wrapping_checkbox_field', 10, 1);
add_action('woocommerce_order_details_after_customer_details', 'mermer_show_gift_card_text_area_and_gift_wrapping_checkbox_field', 10, 1);

function mermer_show_gift_card_text_area_and_gift_wrapping_checkbox_field($order){
    $gift_text = $order->get_meta('mermer_gift_card_text_field');
    $gift_wrapping_checkbox = $order->get_meta('mermer_gift_wrapping_checkbox');

    if(!empty($gift_text)){
        echo '<p>' . __('Geschenkkartentext', 'text-language') . ':<br>' . esc_html($gift_text) . '</p>';
    } 

    echo '<p>' . __('Geschenkverpackung', 'text-language') . ':</p>' . ($gift_wrapping_checkbox === '1' ? __('Ja', 'text-language') : __('Nein', 'text-language'));
}