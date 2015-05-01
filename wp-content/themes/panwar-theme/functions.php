<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//* Replace WordPress login logo with your own
add_action('login_head', 'pwc_custom_login_logo');

function pwc_custom_login_logo() {

    echo '<style type="text/css">
        h1 a { background-image:url(' . get_bloginfo('stylesheet_directory') . '/images/pwc-web-logo.png) !important; }
    </style>';
}
@ini_set( 'upload_max_size' , '20M' );

class EventsCal extends TimberPost {

    public static function events() {

        $default_args = array(
            'post_type' => 'pwcevents',
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post_status' => 'publish',
        );
        $eventscal = Timber::get_post($default_args, 'EventsCal');

        return $eventscal;
    }

}

//var_dump(EventsCal::get_posts());

/**
 * automatic custom_type.php template names
 * @global type $post
 * @param type $template
 * @return type
 */
function post_type_templates($template) {

    /** access gobal */
    global $post;

    /** get the post type */
    $post_type = get_post_type($post);

    /** if post type archive template name is post_type */
    if (is_post_type_archive($post_type)) {

        /** check for the template else use default */
        $located = locate_template(array($post_type . '.php'));
        if (!empty($located))
            $template = get_query_template($post_type);
    }

    return $template;
}


//add_action('init', 'cptui_register_my_cpt_pwcevents');
function cptui_register_my_cpt_pwcevents() {
register_post_type('pwcevents', array(
'label' => 'Upcoming Events',
'description' => 'Create / Manage events',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'pwcevents', 'with_front' => true),
'query_var' => true,
'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
'labels' => array (
  'name' => 'Upcoming Events',
  'singular_name' => 'pwcevent',
  'menu_name' => 'Upcoming Events',
  'add_new' => 'Add pwcevent',
  'add_new_item' => 'Add New pwcevent',
  'edit' => 'Edit',
  'edit_item' => 'Edit pwcevent',
  'new_item' => 'New pwcevent',
  'view' => 'View pwcevent',
  'view_item' => 'View pwcevent',
  'search_items' => 'Search Upcoming Events',
  'not_found' => 'No Upcoming Events Found',
  'not_found_in_trash' => 'No Upcoming Events Found in Trash',
  'parent' => 'Parent pwcevent',
)
) ); }

add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

$opts = get_option('panwar_options', array());

//echo $opts['warriors_served'];

$ml_widget = MpLoader\Utilities\Widget::factory();

$ml_widget->add_widget('Slideshow', 'panwar_slideshow', 'Slideshow');

add_filter('timber_context', 'add_to_timber');

function add_to_timber($data) {

    $opts = get_option('panwar_options');
    $sidebars['slideshows'] = Timber::get_widgets('panwar_slideshow');
    //$data['theme_sidebars'] = $sidebars;
  //  $data['options'] = $opts;
  //  $data['served'] = $opts[0]["warriorsserved"];

    return $data;
}

require_once(get_stylesheet_directory() . '/titan-framework-checker.php');


add_action('tf_create_options', 'pwc_theme_options');

function pwc_theme_options(){

  $titan = TitanFramework::getInstance('panwar');

  $panel = $titan->createAdminPanel( array(
    'name' => "Panwar Settings",
    'icon' => 'dashicons-star-half',
    'position' => '4',
    'desc' => "Phandle Warrior Connection Site Settings"
  ));

  $panel->createOption( array(

    'name' => 'Warriors Assited',

    'id' => 'warriors_served',

    'type' => 'text'

) );

  $panel->createOption( array(

    'name' => 'Warriors employed',

    'id' => 'warriors_employed',

    'type' => 'text'

) );

  $panel->createOption( array(

    'name' => 'Warriors VA Healhcare',

    'id' => 'warriors_va_healthcare',

    'type' => 'text'

) );


  $panel->createOption( array(

    'name' => 'Warriors EDU benefits',

    'id' => 'warriors_edu',

    'type' => 'text'

) );



  $panel->createOption( array(

    'name' => 'Warriors housed',

    'id' => 'warriors_housed',

    'type' => 'text'

) );


//save

$panel->createOption( array(

    'type' => 'save',

) );

}


add_action( 'after_setup_theme', 'myFunc' );

function myFunc() {

    $titan = TitanFramework::getInstance( 'pamwar' );

    $myValue = $titan->getOption( 'warriors' );

    // Put $myValue to good use

}


//disable sample options
function removeDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'removeDemoModeLink');



$pwc_customizer = MpLoader\Customizer\Settings::factory();
$pwc_settings = MpLoader\Customizer\Settings::add_section('pwc-settings', 'PWC Settings', 'PWC Theme Settings');
$pwc_customizer::add_option($pwc_settings, 'warriors_assisted', 'Warriors Assisted')->set_control_type('input')->customizer();

$pwc_customizer::add_option($pwc_settings, 'warriors_employed', 'Warriors Employed')->set_control_type('input')->customizer();

$pwc_customizer::add_option($pwc_settings, 'warriors_va', 'Warriors VA Care')->set_control_type('input')->customizer();

$pwc_customizer::add_option($pwc_settings, 'warriors_edu', 'Warriors Educated')->set_control_type('input')->customizer();

$pwc_customizer::add_option($pwc_settings, 'warriors_housed', 'Warriors Housed')->set_control_type('input')->customizer();