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