<?php

if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
    'page_title'    =>  'General Theme Options',
    'menu_title'    =>  'Theme Options',
    'menu_slug'     =>  'theme-general-settings',
    'capability'    =>  'edit_posts',
    'position'      =>  "55.3"
  ));

  acf_add_options_sub_page(array(
    'page_title'    =>  'Header/Footer/Misc',
    'menu_title'    =>  'Header/Footer/Misc',
    'parent_slug'   =>  'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title'    =>  'Google Analytics Options',
    'menu_title'    =>  'Google Analytics',
    'parent_slug'   =>  'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title'     => 'Recipes Sidebar',
    'menu_title'    => 'Recipes Sidebar',
    'parent_slug'   =>  'theme-general-settings',
  ));
}
