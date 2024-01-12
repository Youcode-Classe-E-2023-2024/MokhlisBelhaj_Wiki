<?php
function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
        return true;
    }else{
        return false;
    }
}

  function redirect($page){
    header('Location:'.URLROOT.$page);

}
/** 
 * 
 * @param mixed $var
 * @return void
 * 
 * 
*/

function debug($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    die();
}