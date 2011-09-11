<h3><?php echo __('simple_form_example'); ?></h3>
<?php

highlight_string('<?php echo Form::create();

echo Form::input(array(\'label\' => __(\'test\'), \'id\' => \'test\'));

echo Form::end(__(\'send\')); ?>');
?>
<p><strong><?php echo __('returns'); ?>:</strong></p>
<?php

/* Simple form (in construction) */
echo Form::create();

echo Form::input(array('label' => __('test'), 'id' => 'test'));

echo Form::end(__('send'));

?>

<h3><?php echo __('database_query'); ?></h3>
<?php
/* Database query */
highlight_string('<?php $test = $mini->Database->query("SELECT * FROM test"); ?>');
?>

<h3><?php echo __('show_post_data'); ?></h3>
<?php
/* Post data */
highlight_string('<?php $post_data = $mini->Request->post; ?>');
?>

<h3><?php echo __('show_get_data'); ?></h3>
<?php
/* get data */
highlight_string('<?php $get_data = $mini->Request->get; ?>');
?>

<h3><?php echo __('save_data_in_a_session'); ?></h3>
<?php
/* Save data in a session */
highlight_string('<?php $mini->Session->write(\'Hello.world\', \'test\'); ?>');
?>

<h3><?php echo __('show_session_data'); ?></h3>
<?php
/* Show a session data */
highlight_string('<?php echo $mini->Session->read(\'Hello.world\'); ?>');
?>

<h3><?php echo __('simple_mysql_select'); ?></h3>
<?php
/* Simple MySQL select */
highlight_string('<?php $test = $mini->TarTable->select(array(\'table\' => \'test\')); ?>');
?>

<h3><?php echo __('translate_your_application'); ?></h3>
<?php
/* Translate your application in (configuration/locales), set default locale in config.mini.php */
highlight_string('<?php echo __(\'translate_your_application\'); ?>');
?>
<p><strong><?php echo __('returns'); ?></strong>: <?php echo __('translate_your_application'); ?></p>

<h3><?php echo __('http_post_to_some_url'); ?></h3>
<?php
/* HTTP post to some URL */
highlight_string('<?php $mini->Request->send_post(array(\'q\' => \'test\'), \'http://google.com\'); ?>');
?>

<br /><br />

<?php
highlight_string('<?php /* '.__('html_helper_is_comming').' */ ?>');
?>