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
        h1 a { background-image:url('. get_bloginfo( 'stylesheet_directory' ) .'/images/pwc-web-logo.png) !important; }
    </style>';
    
    
}
