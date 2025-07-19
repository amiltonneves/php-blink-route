<?php

define('ROOT', dirname(__FILE__, 3));
define('CONTROLLER_PATH', 'App\\Controllers\\');
define('ROUTES_PATH', ROOT . '\\App\\Routes\\');
define('VIEWS', ROOT . '\\App\\Views\\');
define('MASTER_VIEW', ROOT . '\\App\\Views\\master.php');
define('VIEWS_CONTENTS', ROOT . '\\App\\Views\\contents\\');
define('LOGGED', 'LOGGED');

// definir constantes do DB
// ver se vai para uma pasta Config
define('DB_HOST', 'localhost:');
define('DB_PORT', '3306');
define('DB_NAME', 'mvc');
define('DB_USER', 'root');
define('DB_PASSWORD', '');