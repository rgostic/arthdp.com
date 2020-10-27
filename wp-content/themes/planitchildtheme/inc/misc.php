<?php
// remove 32px margin from header when logged in
add_action('get_header', 'my_filter_head');
function my_filter_head() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}