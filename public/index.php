<?php
/**
 * Project      tufu
 * @author      Giacomo Barbalinardo <info@ready24it.eu>
 * @copyright   2015
 */

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../config/routes.php';
require_once __DIR__.'/../config/config.php';

use Tufu\Tufu;
use Tufu\Core\ConfigManager;

ConfigManager::setConfig($config);
$app = new Tufu();
$app->run();