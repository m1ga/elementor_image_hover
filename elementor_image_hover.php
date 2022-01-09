
<?php
/**
* Plugin Name: Elementor Image Hover
* Plugin URI: https://www.migaweb.de/
* Description: Elementor Image Hover
* Version: 1.0
* Author: Michael Gangolf
* Author URI: https://www.migaweb.de/
**/


add_action('wp_enqueue_scripts', 'enqueue_image_hover_style');

function enqueue_image_hover_style() {
  wp_register_style('image_hover_styles', plugins_url('styles/main.css', __FILE__));
  wp_enqueue_style('image_hover_styles');
}

use Elementor\Plugin;

add_action('init', static function () {
    require_once(__DIR__ . '/widget/image_hover.php');
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor_Widget_Image_Hover());
});
