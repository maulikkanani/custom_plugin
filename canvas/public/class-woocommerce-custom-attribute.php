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
 * public-facing side of the WordPress site.
 *
 * If you're interested in introducing administrative or dashboard
 * functionality, then refer to `class-plugin-name-admin.php`
 *
 * @TODO: Rename this class to a proper name for your plugin.
 *
 * @package woocommerce-custom-attribute
 * @author  Narola Infotech <mk.narola@narolainfotech.com>
 */
class woocommerce_custom_attribute {

    /**
     * Plugin version, used for cache-busting of style and script file references.
     *
     * @since   1.0.0
     *
     * @var     string
     */
    const VERSION = '1.0.0';

    /**
     * @TODO - Rename "plugin-name" to the name of your plugin
     *
     * Unique identifier for your plugin.
     *
     *
     * The variable name is used as the text domain when internationalizing strings
     * of text. Its value should match the Text Domain file header in the main
     * plugin file.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $plugin_slug = 'woocommerce_custom_attribute';

    /**
     * Instance of this class.
     *
     * @since    1.0.0
     *
     * @var      object
     */
    protected static $instance = null;

    /**
     * Initialize the plugin by setting localization and loading public scripts
     * and styles.
     *
     * @since     1.0.0
     */
    private function __construct() {

        // Load plugin text domain
        add_action('init', array($this, 'load_plugin_textdomain'));

        // Activate plugin when new blog is added
        add_action('wpmu_new_blog', array($this, 'activate_new_site'));

        // Load public-facing style sheet and JavaScript.
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        /* Define custom functionality.
         * Refer To http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
         */
        include abs_wca_include.'wca_public_hooks.php';
        add_action('@TODO', array($this, 'action_method_name'));
        add_filter('@TODO', array($this, 'filter_method_name'));
    }

    /**
     * Return the plugin slug.
     *
     * @since    1.0.0
     *
     * @return    Plugin slug variable.
     */
    public function get_plugin_slug() {
        return $this->plugin_slug;
    }

    /**
     * Return an instance of this class.
     *
     * @since     1.0.0
     *
     * @return    object    A single instance of this class.
     */
    public static function get_instance() {

        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Fired when the plugin is activated.
     *
     * @since    1.0.0
     *
     * @param    boolean    $network_wide    True if WPMU superadmin uses
     *                                       "Network Activate" action, false if
     *                                       WPMU is disabled or plugin is
     *                                       activated on an individual blog.
     */
    public static function activate($network_wide) {

        if (function_exists('is_multisite') && is_multisite()) {

            if ($network_wide) {

                // Get all blog ids
                $blog_ids = self::get_blog_ids();

                foreach ($blog_ids as $blog_id) {

                    switch_to_blog($blog_id);
                    self::single_activate();

                    restore_current_blog();
                }
            } else {
                self::single_activate();
            }
        } else {
            self::single_activate();
        }
    }

    /**
     * Fired when the plugin is deactivated.
     *
     * @since    1.0.0
     *
     * @param    boolean    $network_wide    True if WPMU superadmin uses
     *                                       "Network Deactivate" action, false if
     *                                       WPMU is disabled or plugin is
     *                                       deactivated on an individual blog.
     */
    public static function deactivate($network_wide) {

        if (function_exists('is_multisite') && is_multisite()) {

            if ($network_wide) {

                // Get all blog ids
                $blog_ids = self::get_blog_ids();

                foreach ($blog_ids as $blog_id) {

                    switch_to_blog($blog_id);
                    self::single_deactivate();

                    restore_current_blog();
                }
            } else {
                self::single_deactivate();
            }
        } else {
            self::single_deactivate();
        }
    }

    /**
     * Fired when a new site is activated with a WPMU environment.
     *
     * @since    1.0.0
     *
     * @param    int    $blog_id    ID of the new blog.
     */
    public function activate_new_site($blog_id) {

        if (1 !== did_action('wpmu_new_blog')) {
            return;
        }

        switch_to_blog($blog_id);
        self::single_activate();
        restore_current_blog();
    }

    /**
     * Get all blog ids of blogs in the current network that are:
     * - not archived
     * - not spam
     * - not deleted
     *
     * @since    1.0.0
     *
     * @return   array|false    The blog ids, false if no matches.
     */
    private static function get_blog_ids() {

        global $wpdb;

        // get an array of blog ids
        $sql = "SELECT blog_id FROM $wpdb->blogs
			WHERE archived = '0' AND spam = '0'
			AND deleted = '0'";

        return $wpdb->get_col($sql);
    }

    /**
     * Fired for each blog when the plugin is activated.
     *
     * @since    1.0.0
     */
    private static function single_activate() {
        // @TODO: Define activation functionality here
    }

    /**
     * Fired for each blog when the plugin is deactivated.
     *
     * @since    1.0.0
     */
    private static function single_deactivate() {
        // @TODO: Define deactivation functionality here
    }

    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain() {

        $domain = $this->plugin_slug;
        $locale = apply_filters('plugin_locale', get_locale(), $domain);

        load_textdomain($domain, trailingslashit(WP_LANG_DIR) . $domain . '/' . $domain . '-' . $locale . '.mo');
        load_plugin_textdomain($domain, FALSE, basename(plugin_dir_path(dirname(__FILE__))) . '/languages/');
    }

    /**
     * Register and enqueue public-facing style sheet.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {
//        wp_enqueue_style($this->plugin_slug . '-plugin-styles', plugins_url('assets/css/public.css', __FILE__), array(), self::VERSION);
        wp_enqueue_style($this->plugin_slug . '-admin-styles', plugins_url('assets/css/style.css',__FILE__), array(), woocommerce_custom_attribute::VERSION);
        //wp_enqueue_style('jquery.fileupload', plugins_url('assets/css/jquery.fileupload.css', __FILE__), array(), woocommerce_custom_attribute::VERSION);
        wp_enqueue_style('font-awesome', plugins_url('admin/assets/css/font_awesome/css/font-awesome.min.css', ABS_WCA_ADMIN), array(), woocommerce_custom_attribute::VERSION);
        //wp_enqueue_style('tocken-input', plugins_url('assets/css/token-input.css', __FILE__), array(), woocommerce_custom_attribute::VERSION);
        wp_enqueue_style('Google-font', "http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic", array(), woocommerce_custom_attribute::VERSION);
        //wp_enqueue_style('jquery_popup', plugins_url('assets/css/jquery_popup.css', __FILE__), array(), woocommerce_custom_attribute::VERSION);  
        wp_enqueue_style($this->plugin_slug . '-measurement-styles', plugins_url('assets/css/measurement.css',__FILE__), array(), woocommerce_custom_attribute::VERSION);
    }

    /**
     * Register and enqueues public-facing JavaScript files.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {
        //wp_enqueue_script($this->plugin_slug . '-plugin-script', plugins_url('assets/js/public.js', __FILE__), array('jquery'), self::VERSION);
        wp_enqueue_script($this->plugin_slug . '-admin-script', plugins_url('admin/assets/js/comman.js', ABS_WCA_ADMIN), array('jquery'), woocommerce_custom_attribute::VERSION);
        wp_enqueue_script('trenchcoat', plugins_url('assets/js/trenchcoat.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
        wp_enqueue_script('jquery.lightbox_me', plugins_url('assets/js/jquery.lightbox_me.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
        wp_enqueue_script('jQuery-ui', plugins_url('admin/assets/js/jquery-ui.js', ABS_WCA_ADMIN), array('jquery'), woocommerce_custom_attribute::VERSION);
        //wp_enqueue_script('jQuery-fileupload', plugins_url('assets/js/jquery.fileupload.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
        //wp_enqueue_script('jQuery-token-input', plugins_url('assets/js/jquery.tokeninput.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
        //wp_enqueue_script('owl.carousel', plugins_url('assets/js/owl.carousel.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
        //wp_enqueue_script('owl-carousel', plugins_url('assets/js/owl-carousel.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
        wp_enqueue_script('knockhout', plugins_url('admin/assets/js/knockout-3.2.0.js', ABS_WCA_ADMIN), array('jquery'), woocommerce_custom_attribute::VERSION);
        wp_enqueue_script($this->plugin_slug . '-measurent-script', plugins_url('assets/js/measurement.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
        wp_enqueue_script($this->plugin_slug . '-single-image-layers', plugins_url('assets/js/cart_image.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
        wp_enqueue_script($this->plugin_slug . '-fabric_js', plugins_url('assets/js/fabric.js', __FILE__), array('jquery'), woocommerce_custom_attribute::VERSION);
    }

    /**
     * NOTE:  Actions are points in the execution of a page or process
     *        lifecycle that WordPress fires.
     *
     *        Actions:    http://codex.wordpress.org/Plugin_API#Actions
     *        Reference:  http://codex.wordpress.org/Plugin_API/Action_Reference
     *
     * @since    1.0.0
     */
    public function action_method_name() {
        // @TODO: Define your action hook callback here
    }

    /**
     * NOTE:  Filters are points of execution in which WordPress modifies data
     *        before saving it or sending it to the browser.
     *
     *        Filters: http://codex.wordpress.org/Plugin_API#Filters
     *        Reference:  http://codex.wordpress.org/Plugin_API/Filter_Reference
     *
     * @since    1.0.0
     */
    public function filter_method_name() {
        // @TODO: Define your filter hook callback here
    }
}