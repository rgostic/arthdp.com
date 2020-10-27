<?php
// ACF Global Options
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'page_title'  => 'Theme General Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Theme GTM Settings',
    'menu_title'  => 'GTM',
    'parent_slug' => 'theme-general-settings',
  ));

//   acf_add_options_sub_page(array(
//     'page_title'  => 'Theme Cookies Settings',
//     'menu_title'  => 'Cookies',
//     'parent_slug' => 'theme-general-settings',
//   ));
  
  // acf_add_options_sub_page(array(
  //  'page_title'  => 'Theme Header Settings',
  //  'menu_title'  => 'Header',
  //  'parent_slug' => 'theme-general-settings',
  // ));

  // acf_add_options_sub_page(array(
  //   'page_title'  => 'Theme Footer Settings',
  //   'menu_title'  => 'Footer',
  //   'parent_slug' => 'theme-general-settings',
  // ));

  // acf_add_options_sub_page(array(
  //   'page_title'  => 'Theme Social Settings',
  //   'menu_title'  => 'Social',
  //   'parent_slug' => 'theme-general-settings',
  // ));

}

// Add Google API Key
// function my_acf_init() {
//   if ($_SERVER['HTTP_HOST'] === 'localhost') :
//     $key = 'XXXXXXXXXX';
//   else :
//     $key = 'XXXXXXXXXX';
//   endif;
  
//   acf_update_setting('google_api_key', $key);
// }
// add_action('acf/init', 'my_acf_init');