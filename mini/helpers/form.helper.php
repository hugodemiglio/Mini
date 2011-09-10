<?php

class Form {
  
  function create(){
    return '<form action="" method="">';
  }
  
  function input($options = array()){
    return '<label for="'.$options['id'].'">'.$options['label'].'</label><br /><input type="text" id="'.$options['id'].'" /><br />';
  }
  
  function end($button = 'Send'){
    return '<button>'.$button.'</button><br /></form>';
  }
  
}

?>