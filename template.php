<?php
function tcpra_bootstrap_html_head_alter(&$head_elements) {
  unset($head_elements['metatag_generator']);
  unset($head_elements['system_metatag_generator']);
}

function tcpra_bootstrap_preprocess_image_style(&$variables) {
    // If this image is of the type 'Staff Photo' then assign additional classes to it:
    if ($variables['style_name'] == 'people') {
        $variables['attributes']['class'][] = 'img-circle';
    }
    if ($variables['style_name'] == 'campus_logo') {
        $variables['attributes']['class'][] = 'campus-logo';
    }
}

//This function makes the login block still show up on user registration pages.  Stupidddd.
function tcpra_bootstrap_block_view_user_login_alter(&$data, $block) {
    global $user;
    if (!$user->uid && !(arg(0) == 'user' && (arg(1) == 'login'))) {
        $block->subject = t('User login');
        $block->content = drupal_get_form('user_login_block');
    }
}