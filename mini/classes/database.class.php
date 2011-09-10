<?php

/**
 * Database Class
 *
 * PHP 5
 *
 * Mini : A very easy php framework. For small applications.  (http://mini.hgbrasil.com)
 * Copyright 2011, Hugo Demiglio
 *
 * @copyright     Copyright 2011, Hugo Demiglio
 * @link          http://mini.hgbrasil.com (Mini)
 */

class Database{
  
/**
 * Database configuration
 *
 * @var array
 * @access public
 */
  var $database = array();
  
/**
 * Saves the query history
 *
 * @var array
 * @access public
 */
  var $queries = array();
  
/**
 * Saves the database structure
 *
 * @var array
 * @access public
 */
  var $tables = array();
  
/**
 * All keys for encrypt
 *
 * @var string
 * @access public
 */
  var $keys = 'ABCDEFGHIJKLMNOPQRSTUVXYZabcdefghijklmnopqrstuvxyz@1234567890.';
  
/**
 * Default salt for encrypt
 *
 * @var string
 * @access public
 */
  var $salt = '7gvbmLBe3.Eic8aFKOkNIoTdr4CRJu0M1pqHltDYjPhz@nsfVy6AX2QUS9Z5Gx';
  
/**
 * Construct class
 *
 * @return void
 * @access public
 */
  function __construct(){
    if(Configure::read('Mini.database')) $this->database = Configure::read('Mini.database');
    else die(__('database-config-error'));
    $this->dbConnect();
    $this->getTables();
  }
  
/**
 * Run MySQL query
 *
 * @param string $query MySQL query, string $method read/write database, string $mode return all/first database data
 * @return (if read method) array data or 0 if not registers | (if write mode) boolean
 * @access public
 */
  function query($query, $method = 'read', $mode = 'all'){
    $this->queries[] = $query;
    if($method == 'write'){
      @mysql_query($query);
      return true;
    } else {
      $select = @mysql_query($query.($mode == 'all' ? '' : " LIMIT 1"));
      $i = 0;
      while($row = @mysql_fetch_array($select, MYSQL_ASSOC)) {
        $results[$i] = $row;
        $i++;
      }
      if($i == 0) $results = 0;
      elseif($mode == 'first') $results = $results[0];
      return($results);
    }
  }
  
/**
 * Decode string
 *
 * @param string encoded
 * @return string decrypted
 * @access public
 */
  function decode($string = null){
    $string = base64_decode($string);
    $keys = str_split($this->keys);
    $salt = str_split($this->salt);
    if(!empty($string)) $string = str_split($string);
    if(is_array($string)) {
      $i = 0; foreach($string as $key){
        $replace_key = array_search($key, $salt);
        if(strlen($replace_key) > 0) $string[$i] = $keys[$replace_key];
        $i++;
      }
    }
    return implode('', $string);
  }
  
/**
 * Encode string
 *
 * @param string to encode
 * @return string encoded
 * @access public
 */
  function encode($string = null){
    $keys = str_split($this->keys);
    $salt = str_split($this->salt);
    if(!empty($string)) $string = str_split($string);
    if(is_array($string)) {
      $i = 0; foreach($string as $key){
        $replace_key = array_search($key, $keys);
        if(strlen($replace_key) > 0) $string[$i] = $salt[$replace_key];
        $i++;
      }
    }
    return base64_encode(implode('', $string));
  }
  
/**
 * Get all database tables
 *
 * @return array database tables
 * @access public
 */
  function getTables(){
    $tables = $this->query("SHOW TABLES");
    $return = 'empty';
    if(is_array($tables)){
      $return = array();
      foreach($tables as $table){
        $return[] = current($table);
      }
    }
    $this->tables = $return;
  }

/**
 * Connect to MySQL
 *
 * @return void
 * @access public
 */
  function dbConnect(){
    if(is_array($this->database)){
      $database = $this->database;
      $connection = @mysql_connect($database['host'], $database['login'], $database['password']) or die (__('database-connection-error'));
      @mysql_select_db($database['database']) or die (__('database-not-found'));
    } else {
      echo _('database-not-found');
      exit(0);
    }
  }
  
}

?>