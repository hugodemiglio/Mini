<?php
session_start();

include 'functions/pr.function.php';
include 'classes/configure.class.php';

date_default_timezone_set(Configure::read('Mini.timezone'));

include './configuration/bootstrap.php';
include 'functions/locale.function.php';
include './configuration/config.mini.php';
include 'classes/database.class.php';
include 'classes/request.class.php';
include 'classes/session.class.php';
include 'plugins/tartable.plugin.php';
include 'classes/mini.class.php';

?>