<?php

defined('ABSPATH') || exit;

/* 
Youtube Tutorial für "woocommerce_admin_order_data_after_billing_address" gekommen: https://www.youtube.com/watch?v=jGOYhWKH_Vk 
ChatGPT löste mir den Fehler, dass es nicht angezeigt wird. Es lag an dem Hook (der nur für Admin-Bestelldetails ist) und gab mir 
folgenden Vorschlag: "woocommerce_order_details_after_customer_details"
*/

add_action('woocommerce_order_details_after_customer_details', 'mermer_show_gift_card_text_area_and_gift_wrapping_checkbox_field', 10, 1);

function mermer_show_gift_card_text_area_and_gift_wrapping_checkbox_field($order){
    $gift_text = $order->get_meta('mermer_gift_card_text_field');
    $gift_wrapping_checkbox = $order->get_meta('mermer_gift_wrapping_checkbox');

    if(!empty($gift_text)){
        echo '<p>Geschenkkartentext: <br>' . esc_html($gift_text) . '</p>';
    } 

    echo '<p>Geschenkverpackung: </p>' . ($gift_wrapping_checkbox === true ? 'Ja' : 'Nein');
}