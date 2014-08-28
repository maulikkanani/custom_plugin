<?php

/**
 * Plugin Name.
 *
 * @package   woocommerce-custom-attribute
 * @author    Narola Infotech <mk.narola@narolainfotech.com>
 * @license   GPL-2.0+
 * @link      http://narolainfotech.com
 * @copyright 2014 Narola Infotech
 */

/**
 * Plugin class. This class should ideally be used to work with the
 * administrative side of the WordPress site.
 *
 * If you're interested in introducing public-facing
 * functionality, then refer to `class-plugin-name.php`
 *
 * @TODO: Rename this class to a proper name for your plugin.
 *
 * @package woocommerce-custom-attribute
 * @author  Narola Infotech <mk.narola@narolainfotech.com>
 */
class woocommerce_custom_attribute_admin {

    /**
     * Instance of this class.
     *
     * @since    1.0.0
     *
     * @var      object
     */
    protected static $instance = null;

    /**
     * Slug of the plugin screen.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $plugin_screen_hook_suffix = null;

    /**
     * Initialize the plugin by loading admin scripts & styles and adding a
     * settings page and menu.
     *
     * @since     1.0.0
     */
    private function __construct() {

        /*
         * @TODO :
         *
         * - Uncomment following lines if the admin class should only be available for super admins
         */
        /* if( ! is_super_admin() ) {
          return;
          } */

        /*
         * Call $plugin_slug from public plugin class.
         *
         * @TODO:
         *
         * - Rename "Plugin_Name" to the name of your initial plugin class
         *
         */
        $plugin = woocommerce_custom_attribute::get_instance();
        $this->plugin_slug = $plugin->get_plugin_slug();
       
        // Load admin style sheet and JavaScript.
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_styles'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
        
        wca_load::controller('wca_custome_attributes');
        
        add_action('add_meta_boxes', array($this, 'add_meta_box'));
        add_action( 'save_post', array( $this, 'save_attributs' ), 1, 2 );
        
        // Save Product Meta Boxes
        
        add_action( 'wca_product_attribute_save', 'wca_custome_attributes::save', 10, 2 );
        // Add the options page and menu item.
        add_action('admin_menu', array($this, 'add_plugin_admin_menu'));

        // Add an action link pointing to the options page.
        $plugin_basename = plugin_basename(plugin_dir_path(realpath(dirname(__FILE__))) . $this->plugin_slug . '.php');
        add_filter('plugin_action_links_' . $plugin_basename, array($this, 'add_action_links'));

        /*
         * Define custom functionality.
         *
         * Read more about actions and filters:
         * http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
         */
        add_action('@TODO', array($this, 'action_method_name'));
        add_filter('@TODO', array($this, 'filter_method_name'));
         
    }

    /**
     * Return an instance of this class.
     *
     * @since     1.0.0
     *
     * @return    object    A single instance of this class.
     */
    public static function get_instance() {

        /*
         * @TODO :
         *
         * - Uncomment following lines if the admin class should only be available for super admins
         */
        /* if( ! is_super_admin() ) {
          return;
          } */

        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Register and enqueue admin-specific style sheet.
     *
     * @TODO:
     *
     * - Rename "Plugin_Name" to the name your plugin
     *
     * @since     1.0.0
     *
     * @return    null    Return early if no settings page is registered.
     */
    public function enqueue_admin_styles() {
        $screen = get_current_screen();
            //wp_enqueue_style('Bootstarp3', plugins_url('assets/css/bootstrap.min.css', __FILE__), array(), woocommerce_custom_attribute::VERSION);
            wp_enqueue_style($this->plugin_slug . '-admin-styles', plugins_url('assets/css/style.css', __FILE__), array(), woocommerce_custom_attribute::VERSION);
            wp_enqueue_style('jquery.fileupload', plugins_url('assets/css/jquery.fileupload.css', __FILE__), array(), woocommerce_custom_attribute::VERSION);
            wp_enqueue_style('fileupload', "http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic", array(), woocommerce_custom_attribute::VERSION);
            wp_enqueue_style('Google-font', "http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic", array(), woocommerce_custom_attribute::VERSION);
    }

    /**
     * Register and enqueue admin-specific JavaScript.
     *
     * @TODO:
     *
     * - Rename "Plugin_Name" to the name your plugin
     *
     * @since     1.0.0
     *
     * @return    null    Return early if no settings page is registered.
     */
    public function enqueue_admin_scripts() {
        
            wp_enqueue_script($this->plugin_slug . '-admin-script', plugins_url('assets/js/comman.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
            wp_enqueue_script('trenchcoat', plugins_url('assets/js/trenchcoat.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
            wp_enqueue_script('jQuery-ui', plugins_url('assets/js/jquery-ui.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
            wp_enqueue_script('jQuery-fileupload', plugins_url('assets/js/jquery.fileupload.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
            wp_enqueue_script('owl.carousel', plugins_url('assets/js/owl.carousel.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
            wp_enqueue_script('owl-carousel', plugins_url('assets/js/owl-carousel.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
            wp_enqueue_script('knockhout', plugins_url('assets/js/knockout-3.2.0.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
    }

    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */
    public function add_plugin_admin_menu() {

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         * @TODO:
         *
         * - Change 'Page Title' to the title of your plugin admin page
         * - Change 'Menu Text' to the text for menu item for the plugin settings page
         * - Change 'manage_options' to the capability you see fit
         *   For reference: http://codex.wordpress.org/Roles_and_Capabilities
         */
        /* $this->plugin_screen_hook_suffix = add_options_page(
          __( 'Page Title', $this->plugin_slug ),
          __( 'Menu Text', $this->plugin_slug ),
          'manage_options',
          $this->plugin_slug,
          array( $this, 'display_plugin_admin_page' )
          ); */
        $this->plugin_screen_hook_suffix = add_menu_page('Fabric Master', 'Woo Attributes', 'manage_options', 'woo-custome-attribute', array($this, 'attributes_master'), plugins_url('woocommerce-custom-attribute/admin/assets/images/woo-custome_attribute.png'),59);



        add_submenu_page('woo-custome-attribute', 'Buttons', 'Buttons', 'manage_options', 'button_thread', array($this, 'button_thread'));
    }

    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */
    public function display_plugin_admin_page() {
        include_once( 'views/admin.php' );
    }

    public function attributes_master() {
        include_once( 'views/admin.php' );
    }

    public function button_thread() {
        include_once 'views/masters/buttons/list.php';
    }

    /**
     * Add settings action link to the plugins page.
     *
     * @since    1.0.0
     */
    public function add_action_links($links) {

        return array_merge(
                array(
            'settings' => '<a href="' . admin_url('options-general.php?page=' . $this->plugin_slug) . '">' . __('Settings', $this->plugin_slug) . '</a>'
                ), $links
        );
    }

    /**
     * NOTE:     Actions are points in the execution of a page or process
     *           lifecycle that WordPress fires.
     *
     *           Actions:    http://codex.wordpress.org/Plugin_API#Actions
     *           Reference:  http://codex.wordpress.org/Plugin_API/Action_Reference
     *
     * @since    1.0.0
     */
    public function action_method_name() {
        // @TODO: Define your action hook callback here
    }

    /**
     * NOTE:     Filters are points of execution in which WordPress modifies data
     *           before saving it or sending it to the browser.
     *
     *           Filters: http://codex.wordpress.org/Plugin_API#Filters
     *           Reference:  http://codex.wordpress.org/Plugin_API/Filter_Reference
     *
     * @since    1.0.0
     */
    public function filter_method_name() {
        // @TODO: Define your filter hook callback here
    }

    /**
     * Adds the meta box container.
     */
    public function add_meta_box($post_type) {
        $post_types = array('product');     //limit meta box to certain post types
        if (in_array($post_type, $post_types)) {
            add_meta_box(
                    'customize_attribute'
                    , __('Customize Attributes', 'woocommerce-custom-attribute')
                    , array($this, 'rander_attributes')
                    , $post_type
                    , 'advanced'
                    , 'high'
            );
            add_meta_box(
                    'customize_image_layer'
                    , __('Image layer', 'woocommerce-custom-attribute')
                    , array($this, 'rander_image_layers')
                    , $post_type
                    , 'side'
                    , 'core'
            );
        }
    }

    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save_attributs( $post_id, $post ) {
           // $post_id and $post are required
		if ( empty( $post_id ) || empty( $post ) ) {
			return;
		}

		// Dont' save meta boxes for revisions or autosaves
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}
		
		// Check the nonce
		if ( empty( $_POST['woocommerce_meta_nonce'] ) || ! wp_verify_nonce( $_POST['woocommerce_meta_nonce'], 'woocommerce_save_data' ) ) {
			return;
		} 

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check user has permission to edit
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// Check the post type
		if ( ! in_array( $post->post_type, array( 'product') ) ) {
			return;
		}
		do_action( 'wca_product_attribute_save', $post_id, $post );
    }

    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function rander_attributes($post) {
        global $post;
        $category='trenchcoat';                                         // Current category
        include_once("views/$category/customize-attributes.php");
       
    }
    
    public function rander_image_layers($post) {
          global $post;
        $category='trenchcoat';                                         // Current category
        include_once("views/$category/image-layer.php");
    }
}
