<?php
// ACF Blocks
if(function_exists('acf_register_block_type')) {
  add_action('acf/init', 'register_acf_block_types');
}

function register_acf_block_types() {

  // content
//   acf_register_block_type(
//     array(
//       'name' => 'content',
//       'title' => 'Content',
//       'description' => 'A custom content block.',
//       'render_template' => 'template-parts/blocks/content.php',
//       'icon' => 'media-document',
//       'keywords' => array('content', 'custom'),
//       'supports' => array( 'align' => false, ),
//       'mode' => 'edit',
//     )
//   );

}

/*
* Restrict blocks
*/
add_filter( 'allowed_block_types', 'allowed_block_types' );
function allowed_block_types( $allowed_blocks ) {

  global $post_ID;

  $page_template = get_page_template_slug( $post_ID );
  $post_type = get_post_type();

  // post type
  if('fake-custom-post-type' == $post_type) :

    $blocks = array(
    //   'acf/content',
    );

  // page template
  elseif('page-fake-template.php' == $page_template) :

    $blocks = array(
        // 'acf/content',
    );

  else :

    $blocks = array(
        'core/archives',
        'core/audio',
        'core/button',
        'core/categories',
        'core/code',
        'core/column',
        'core/columns',
        'core/coverImage',
        'core/embed',
        'core/file',
        'core/freeform',
        'core/gallery',
        'core/heading',
        'core/html',
        'core/image',
        'core/latestComments',
        'core/latestPosts',
        'core/list',
        'core/more',
        'core/nextpage',
        'core/paragraph',
        'core/preformatted',
        'core/pullquote',
        'core/quote',
        'core/reusableBlock',
        'core/separator',
        'core/shortcode',
        'core/spacer',
        'core/subhead',
        'core/table',
        'core/textColumns',
        'core/verse',
        'core/video',
    );

  endif;
 
  return $blocks;
}