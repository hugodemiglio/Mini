<?php

include 'mini/mini.php';

/* Simple form (in construction) */
echo Form::create();

echo Form::input(array('label' => 'Test', 'id' => 'test'));

echo Form::end();

/* Database query */
$test = $mini->Database->query("SELECT * FROM test");

/* Post data */
$post_data = $mini->Request->post;

/* Get data */
$get_data = $mini->Request->get;

/* Save data in a session */
$mini->Session->write('Hello.world', 'test');

/* Show a session data */
echo $mini->Session->read('Hello.world');

/* Simple MySQL select */
//$test = $mini->TarTable->select(array('table' => 'test'));

/* Translate your application in (configuration/locales), set default locale in config.mini.php */
echo __('translate_your_application');

/* HTTP post to some URL */
//$mini->Request->send_post(array('q' => 'test'), 'http://google.com');

/* HTML Helper is comming! */

/* Show mini instance */
pr($mini);

?>