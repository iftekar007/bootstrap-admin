<?php
function admin_theme() {
    return array(
        'user_login_block' => array(
            'template' => 'user-login', ## storage template in mytheme/user_login_block.tpl.php
            'variables' => array('form' => NULL), ## you may remove this line in this case
        ),
    );
}
function admin_preprocess_user_login_block(&$variables) {
    $variables['form'] = drupal_build_form('user_login_block', user_login_block(array())); ## I have to build the user login block on myself.
}


function admin_form_element($variables) {
    //echo 89;
    //exit;
    $output = '';
    $output = $variables['element']['#children'];
    // echo strlen($variables['element']['#name']);
    $elementname= substr($variables['element']['#name'],0,strlen($variables['element']['#name'])-1);
    $pos = strpos($elementname,'[');
    if ($pos !== false) {
        $elementname = substr_replace($elementname,'][',$pos,strlen('['));
    }
    //var_dump(form_get_errors());
    if(is_array(form_get_errors())){
        if (array_key_exists($variables['element']['#name'],form_get_errors()) || array_key_exists($elementname,form_get_errors())) {
            $errors=form_get_errors();
            // echo $variables['element']['#name'];
            if(!isset($errors[$variables['element']['#name']])) $errors[$variables['element']['#name']]=$errors[$elementname];
            $output .= '<div class="messages error messages-inline">' . @$errors[$variables['element']['#name']] . '</div>';
        }
    }
    return $output;
}

?>