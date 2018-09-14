<?php 
/* 
 * 
 * File:        gravatar.php 
 * Type:        function 
 * Name:        gravatar 
 * Description: This TAG creates a valid URL to a Gravatar. 
 *
 * CODE BY
 * Vahab Seyed Chorteh
 * http://vahabonline.ir
 * https://webponeh.ir
 * myvahab@gmail.com
 * https://github.com/vahabonline
 * https://gitlab.com/vahab00
 * https://t.me/mrvahab
 * All Rights Reserved
 * © 2018 VahabSeyedChorteh
 *
 */ 
function smarty_function_gravatar($params, &$smarty) { 
    // check for email adress 
    if(!isset($params['email']) && !isset($params['default'])) { 
        $smarty->trigger_error("gravatar: neither 'email' nor 'default' attribute passed"); 
        return; 
    } 
      
    $email = (isset($params['email']) ? trim(strtolower($params['email'])) : ''); 
    $rating = (isset($params['rating']) ? $params['rating'] : 'R'); 
    $url = "https://www.gravatar.com/avatar/".md5($email) . "?r=".$rating; 
      
    if(isset($params['default'])) 
        $url .= "&d=".urlencode($params['default']); 
    if(isset($params['size'])) 
        $url .= "&s=".$params['size']; 
          
    if(isset($params['assign'])) { 
        $smarty->assign($params['assign'], $url); 
        return; 
    } 
      
    return $url; 
} 
  
?>
