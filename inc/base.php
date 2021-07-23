<?php
/**
 * Include block functionality 
 * @param $name 
 * @param $args
 */
function block($name, $args = [], $echo = true){
    $html = '';
  
    //set each key as a variable
    foreach($args as $key => $value){
      $$key = $value;
    }
  
    if($echo == false){
      ob_start();
    }
    
    //include the template to have access to variables
    $template_location = 'blocks/' . $name . '/' . $name . '.php';
    if(locate_template($template_location)){
      require(get_template_directory() . '/' . $template_location);
    } else {
      pr($name . ' block not found.');
    }
  
    if($echo == false){
      $html = ob_get_contents();
      ob_end_clean();
    }
  
    //unset any variables we've created
    foreach($args as $key => $value){
      unset($$key);
    }
  
    return $html;
  }