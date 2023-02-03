<?php

use App\App\App;
use App\App\Database\{QueryBuilder, Connection};

require 'vendor/autoload.php';
require 'helpers/view.php';
require 'helpers/redirect.php';

define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_ROOT', '/');
define('URL_SUBFOLDER', '/');

App::bind('config', require 'config.php');

App::bind(
    'db',
    new QueryBuilder(Connection::make(App::get('config')['database']))
);