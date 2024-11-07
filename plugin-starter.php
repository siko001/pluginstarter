<?php
// Plugin Name: 
// Description: 
// Version: 
// Author: 
// Author URI: 
// Text Domain: 

namespace Starter;

if (!defined('ABSPATH')) {
    echo 'Sharks Live Here';
    exit;
}

class plugin {

    function __construct() {
        // Enqueue scripts and styles for admin before any checks
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_styles_and_scripts'));

        // if we need the plugin to work with woocommerce
        // include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        // if (!is_plugin_active('woocommerce/woocommerce.php')) {
        // }

        // Register the settings
        add_action('admin_init', array($this, 'register_settings'));
        // Register the admin menu
        add_action('admin_menu', array($this, 'admin_menu'));

        // Add the plugin functions
        add_action('wp_footer', array($this, 'plugin_functions'));
        // Frontend scripts
        add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_styles_and_scripts'));
    }

    //---------------------------------- Always Loaded

    // Admin scripts & styles
    public function enqueue_admin_styles_and_scripts() {
        // import 1 main css file inside has different includes
        wp_enqueue_style('admin-main', plugin_dir_url(__FILE__) . 'src/css/admin/main-admin.css');

        // import 1 main js file inside has different includes
        wp_enqueue_script('admin-scripts-success', plugin_dir_url(__FILE__) . 'src/js/admin/notice-success.js');
    }

    // Display an admin notice if WooCommerce is not active (optional if the plugin requires WooCommerce)
    // public function gh_s_ocs_woocommerce_inactive_notice() {
    //     require(plugin_dir_path(__FILE__) . 'templates/admin/admin-notice-error-wc.php');
    // }
    //------------------------------- End Always Loaded


    // Frontend scripts & styles
    public function enqueue_frontend_styles_and_scripts() {
        wp_enqueue_style('styles', plugin_dir_url(__FILE__) . 'src/css/frontend/styles.css');
    }

    // Add the Open/Close Store menu to the admin dashboard
    public function admin_menu() {
        add_menu_page('Plugin Name', 'Plugin', 'manage_options', 'plugin-slug-here', array($this, 'admin_page'));
    }

    // Register the settings and add the settings group to the allowed options list
    public function register_settings() {
        require(plugin_dir_path(__FILE__) . 'includes/settings.php');
    }

    // Admin Settings Options
    public function admin_page() {
        require(plugin_dir_path(__FILE__) . 'templates/admin/admin-settings.php');
    }

    // Include all the plugin functions
    public function plugin_functions() {
        require(plugin_dir_path(__FILE__) . 'includes/plugin-functions.php');
    }
}

$plugin = new plugin();
