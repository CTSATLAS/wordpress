<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


	if (!class_exists('Timber')){
		echo 'Timber not activated';
	}
        $evc_args = array( 'post_type' => 'events_cal', 'posts_per_page' => 10 );
	$data = Timber::get_context();
	$timber_posts = Timber::get_posts($evc_args);
	$data['posts'] = $timber_posts;
	$templates = array('events_cal.twig');
//	if (is_home()){
//		array_unshift($templates, 'home.twig');
//	}
	Timber::render($templates, $data);

