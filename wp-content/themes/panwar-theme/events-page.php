<?php

/*
Template Name: Events
*/
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Template Name : Events
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['events_url'] = get_post_type_archive_link( 'pwcevents' );
$templates = array('events-page.twig');
Timber::render($templates, $context);