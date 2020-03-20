<?php
/*
Plugin Name: Niz Products Carousel for Woocommerce
Plugin URI: https://nizolas.izac.pro/woocommerce-products-carousel-plugin/
Description: Niz Products Carousel for Woocommerce allows you to create a Woocommerce products carousel easily!
Version: 1.0.0
Author: Nicolas
Author URI: https://nizolas.izac.pro
Text Domain: niz-woopc
Domain Path: /languages/
License: GPLv2
*/
if (!defined('ABSPATH')){
    exit("Do not access this file directly.");
}

define( 'NIZ_WOOPC_URL', plugins_url( '/', __FILE__ ) );
define( 'NIZ_WOOPC_PATH', plugin_dir_path(__FILE__) );
define( 'NIZ_WOOPC_PLUGIN_NAME','Niz Product Carousel for Woocommerce');

require_once(NIZ_WOOPC_PATH.'inc/class.niz-dependency-checker.php');

class NizWpc{
    public static $_instance=null;

    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'frontend_scripts'));
        add_action('admin_menu', array($this, 'setup_menu' ) );

        add_shortcode('niz_woopc',array($this, 'product_carousel_shortcode'));
    }
    public static function get_instance() {
        self::$_instance = empty(self::$_instance) ? new NizWpc() : self::$_instance;
        return self::$_instance;
    }

    public function admin_scripts(){
        wp_enqueue_script( 'niz_woopc-owl-admin', NIZ_WOOPC_URL  . 'assets/js/admin.js', array('jquery'));
        wp_localize_script('niz_woopc-owl-admin','niz_ad_params',array('prefix'=>'niz_woopc'));
    }

    public function frontend_scripts() {
        wp_enqueue_style( 'niz_woopc-owl-style', NIZ_WOOPC_URL  . 'lib/owl/assets/owl.carousel.min.css');
        wp_enqueue_style( 'niz_woopc-owl-style-theme', NIZ_WOOPC_URL  . 'lib/owl/assets/owl.theme.default.min.css');
        wp_enqueue_style( 'niz_woopc-style', NIZ_WOOPC_URL  . 'assets/css/style.css');

        wp_enqueue_script( 'niz_woopc-owl', NIZ_WOOPC_URL  . 'lib/owl/owl.carousel.min.js', array('jquery'));
        wp_enqueue_script( 'niz_woopc-script', NIZ_WOOPC_URL  . 'assets/js/script.js', array('jquery','niz_woopc-owl'));
    }
    /* ADMIN */

     
    public function setup_menu(){
        $menu = add_menu_page( 
            'Woo Product Carousel', 
            'Niz Woo Product Carousel', 
            'manage_options', 
            'niz-woo-product-carousel', 
            array($this, 'admin_page'),
            'dashicons-images-alt' );
        add_action( 'admin_print_scripts-' . $menu, array($this, 'admin_scripts') );
    }
     
    public function admin_page(){
        $this->get_template_part('admin.php');
    }

    /*UTILS*/
    public function get_template_part( $template_path, $variables = array(), $print = true){
      $filePath=NIZ_WOOPC_PATH."/templates/$template_path";
      $output = NULL;
        if(file_exists($filePath)){
            // Extract the variables to a local namespace
            extract($variables);
            // Start output buffering
            ob_start();
            // Include the template file
            include $filePath;
            // End buffering and return its contents
            $output = ob_get_clean();
        }
        if ($print) {
            echo $output;
        }
        return $output;
    }
    /*SHORTCODE*/

    public function product_carousel_shortcode($atts){
        $args = shortcode_atts( array(
            /*Shortcode params*/
            'type'=> 'best_selling_products',
            'limit'        => '12',
            'columns'      => '1',
            'orderby'      => 'date',
            'order'        => 'DESC',
            'category'     => '',
            'cat_operator' => 'IN',

            /*OWL params*/
            'show_item' => 2,
            'show_item_tablet'  =>  2,
            'show_item_mobile'  =>  1,
            'autoplay'  =>  1,
            'pause'  =>  0,
            'nav'  =>  0,
            'dots'  =>  0,
            'mouse_drag'  =>  1,
            'touch_drag'  =>  1,
            'loop'  =>  1,
            'speed'  =>  '300',
            'delay'  =>  '2000',
        ), $atts );

        return $this->get_template_part('product_carousel.php',array('data'=>$args),false );
    }

    public static function activate(){    }
    public static function deactivate(){    }
}
$dependency=new Nyz_Dependency_Checker();
if($dependency->check())
    $nizWpc=new NizWpc();


register_activation_hook(NIZ_WOOPC_PATH.'/niz_woopc.php','NizWpc::activate');
register_deactivation_hook(NIZ_WOOPC_PATH.'/niz_woopc.php','NizWpc::deactivate');



























/**
 *  Get all scripts and styles from Wordpress
 */
// function print_scripts_styles() {

//     $result = [];
//     $result['scripts'] = [];
//     $result['styles'] = [];

//     // Print all loaded Scripts
//     global $wp_scripts;
//     foreach( $wp_scripts->queue as $script ) :
//         $result['scripts'][] =  $wp_scripts->registered[$script]->src . ";";
//     endforeach;

//     // // Print all loaded Styles (CSS)
//     // global $wp_styles;
//     // foreach( $wp_styles->queue as $style ) :
//     //     $result['styles'][] =  $wp_styles->registered[$style]->src . ";";
//     // endforeach;

//     var_dump( $result );
// }

// add_action( 'wp_head', 'print_scripts_styles');

