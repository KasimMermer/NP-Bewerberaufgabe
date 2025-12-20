<?php

/**
 * Plugin Name: NP Bewerberaufgabe
 * Description: Ein Plugin zur Demonstration von WordPress-Plugin-Fähigkeiten.
 * Version: 1.0.0
 * Author: Ninjapiraten
 * Requires Plugins: woocommerce
 */

defined('ABSPATH') || exit;

define('NPBA_VERSION', '1.0.0');
define('NPBA_DIR_PATH', plugin_dir_path(__FILE__));
define('NPBA_DIR_URL', plugin_dir_url(__FILE__));

/**
 * Die Root-Datei des Plugins wird nur zum Laden und Initialisieren der Funktionen verwendet.
 * Die eigentliche Logik des Plugins befindet sich in den entsprechenden Dateien im "includes"-Verzeichnis.
 */

/**
 * Enqueue der CSS- und JS-Dateien des Plugins.
 */
require_once NPBA_DIR_PATH . 'includes/assets.php';
require_once NPBA_DIR_PATH . 'includes/checkout-fields.php';
require_once NPBA_DIR_PATH . 'includes/order-details.php';
require_once NPBA_DIR_PATH . 'includes/email-fields.php';