<?php

App::import('Helper', 'Form');

Configure::write('Mini.environment', 'development');
//Configure::write('Mini.environment', 'production');

Configure::write('Mini.locale', 'en_us');

Configure::write('Mini.timezone', 'America/Sao_Paulo');

Configure::write('Mini.security_salt', '7gvbmLeB3.Eic8aFKOkNIoTdr4CRJu0M1pqHltDYjPhz@nsfVy6AX2QUS9Z5Gx');

Configure::write('Mini.database', array(
  'host' => '127.0.0.1',
  'login' => 'root',
  'password' => '',
  'database' => 'mini',
));

?>