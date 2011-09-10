<?php

class Request {
  var $post;
  var $get;
  var $server;
  
  function __construct(){
    $this->post = $this->protect($_POST);
    $this->get = $this->protect($_GET);
    $this->server = $_SERVER;
  }
  
  function isset_post(){
    if(is_array($this->post) AND count($this->post) > 0) return true;
    return false;
  }
  
  function returnGets(){
    if(is_array($this->get) AND count($this->get) > 0){
      $i = 1; foreach($this->get as $key => $value){
        if($i == 1) $return = '?';
        $return .= $key.'='.$value;
        if($i != count($this->get)) $return .= '&';
        $i++;
      }
      return $return;
    }
    return '';
  }
  
  function send_post($post_data = array(), $url = null){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1 );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $return = curl_exec($ch);

    if (curl_errno($ch)) {
    return curl_error($ch);
    }
    curl_close($ch);
    return $return;
  }
  
  function protect($array = array()){
    if(is_array($array)) foreach($array as $key => $value){
      $array[$key] = mysql_real_escape_string($value);
    }
    return $array;
  }
  
  function redirect($location = '', $method = 'header'){
    if($method == 'header') header("Location: ".$location);
    else echo '<meta http-equiv="refresh" content="0;url='.$location.'" />';
  }
  
}

?>