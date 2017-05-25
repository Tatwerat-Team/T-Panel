<?php

include_once(get_template_directory() . '/tpanel/panel-functions.php');

class kud_TPanel {

    public $default_settings;
    public $options;
    public $optionName = 'Tpanel_Options_kud';

    // Add the menus / head to admin panel
    public function __construct() {
        global $pagenow;
        $this->default_settings = array();
        add_action('admin_menu', array($this, 'add_menu'));
        if (is_admin() && isset($_GET['page']) && $_GET['page'] == 'T-Panel' && $pagenow == 'themes.php') {
            add_action('admin_head', array($this, 'admin_head'));
        }
//        if (!is_array(get_option($this->optionName))) {
//            add_option($this->optionName, $this->default_settings);
//        }
        $this->options = get_option($this->optionName);
    }

    // Add Control panel menus
    public function add_menu() {
        add_theme_page(esc_html__('Setting - Panel', 'kud'), esc_html__('Setting - Panel', 'kud'), 'manage_options', 'T-Panel', array(&$this, 'options_menu'), null, 25);
    }

    // Add CSS and JavaScript (Header) - if needed
    public function admin_head() {
        wp_enqueue_style('tpanel-style', get_template_directory_uri() . '/tpanel/assets/css/style.css');
        wp_enqueue_script('tipsy-js', get_template_directory_uri() . '/tpanel/assets/js/jquery/jquery.tipsy.js', array('jquery'));
        wp_enqueue_script('jquery-ui-js', get_template_directory_uri() . '/tpanel/assets/js/jquery/jquery-ui.js', array('jquery'));
        wp_enqueue_script('minicolors-js', get_template_directory_uri() . '/tpanel/assets/js/mini-colors/minicolors.min.js', array('jquery'));
        wp_enqueue_script('custom-js', get_template_directory_uri() . '/tpanel/assets/js/jquery/jquery.custom.js', array('jquery'));
        if (is_rtl()) {
            wp_enqueue_style('tpanel-rtl', get_template_directory_uri() . '/tpanel/assets/css/rtl.css');
        }
    }

    // Get Panel options
    public function panelOption($value) {
        $panel_option = get_option($this->optionName);
        return isset($panel_option[$value]) ? $panel_option[$value] : '';
    }

    // Process options page
    public function options_menu() {
        // Load an appropriate options page
        if (!empty($_GET['page'])) {
            include_once(get_template_directory() . '/tpanel/includes/icons-array.php');
            include_once(get_template_directory() . '/tpanel/panel-ui.php');
            include_once(get_template_directory() . '/tpanel/t-panel.php');
        }
    }

    public function saveOptions() {
        if (isset($_POST['tpanel_save']) and ! empty($_POST['tpanel_save'])) {
            foreach ($_POST as $key => $value) {
                if ($key != 'tpanel_save') {
                    $key_clean = str_replace('tpanel_', '', $key);
                    $this->options["$key_clean"] = $_POST["$key"];
                }
            }
            //die(var_dump($this->options));
            update_option($this->optionName, $this->options);
        }
        if (isset($_POST['tpanel_reset']) and $_POST['tpanel_reset'] == 'true') {
            delete_option($this->optionName);
        }
    }

}

$T_Panel = new kud_TPanel();
$T_Panel->saveOptions();

function T_Panel($value, $strip = TRUE) {
    global $T_Panel;
    if ($strip == FALSE) {
        return $T_Panel->panelOption($value);
    } elseif ($strip == TRUE) {
        return stripcslashes(esc_html($T_Panel->panelOption($value)));
    }
}

//die(var_dump(get_option('Tpanel_Options_kud')));