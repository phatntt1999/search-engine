<?php
/*Plugin Name: Scrapper PluginDescription:Plugin URI:Author:      Austin NguyenVersion:     1.0.0*/
if (!defined('ABSPATH')) {
    exit;
}
include(plugin_dir_path(__FILE__) . 'Dir/simple_html_dom.php');

function scrap_add_toplevel_menu()
{


    add_menu_page(
        'Scrap Settings',
        'Product Scrap',
        'manage_options',
        'scrap',
        'scrap_display_settings_page',
        'dashicons-admin-generic',
        null
    );

}

add_action('admin_menu', 'scrap_add_toplevel_menu');

include(plugin_dir_path(__FILE__) . 'Dir/settings.php');