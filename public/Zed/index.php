<?php

use Pyz\Zed\Application\Communication\ZedBootstrap;
use Spryker\Shared\Config\Application\Environment;
use Spryker\Shared\ErrorHandler\ErrorHandlerEnvironment;

require __DIR__ . '/maintenance/maintenance.php';

define('APPLICATION', 'ZED');
defined('APPLICATION_ROOT_DIR') || define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../..'));

if (getenv('application_env') == 'development') 
  include APPLICATION_ROOT_DIR . '/c3.php';

require_once APPLICATION_ROOT_DIR . '/vendor/autoload.php';

Environment::initialize();

$errorHandlerEnvironment = new ErrorHandlerEnvironment();
$errorHandlerEnvironment->initialize();

$bootstrap = new ZedBootstrap();
$bootstrap
    ->boot()
    ->run();
