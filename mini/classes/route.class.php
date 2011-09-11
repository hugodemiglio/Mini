<?php

$Route = new Route;

class Route {
  
  var $mini = null;
  
  var $layout = 'default';
  var $view = null;
  var $root = 'home';
  var $path = null;
  
  var $connections = array();
  
  function __construct(){
    $this->mini = new Mini;
    
    $this->path = $this->mini->Request->get['url'];
  }
  
  function connect($path = null, $view = null){
    if(!empty($path) and !empty($view)){
      $this->connections[$path] = $view;
      return true;
    }
    return false;
  }
  
  function choose_view(){
    if(empty($this->path)) {
      $this->view = $this->root;
    }
    else {
      if(isset($this->connections[$this->path])){
        $this->view = $this->connections[$this->path];
      } else {
        $this->view = $this->path;
      }
    }
  }
  
  function render_view(){
    $path = realpath('./views').'/'.$this->view.'.php';
    
    if(!file_exists($path)){
      $path = realpath('./mini/views/errors/missing_view.php');
    }
    
    ob_start();
    $view_name = realpath('./views').'/'.$this->view.'.php';
    $mini = $this->mini;
    include $path;
    $view_content = ob_get_contents();
    ob_end_clean();
    return $view_content;
  }
  
  function render_layout(){
    $this->choose_view();
    
    $path = realpath('./views').'/'.$this->layout.'.php';
    
    if(!file_exists($path)){
      $path = realpath('./mini/views/errors/missing_layout.php');
    }
    
    ob_start();
    $layout_name = realpath('./views').'/'.$this->layout.'.php';
    $mini = $this->mini;
    $view_content = $this->render_view();
    include $path;
    $layout_content = ob_get_contents();
    ob_end_clean();
    
    echo $layout_content;
  }
  
}

?>