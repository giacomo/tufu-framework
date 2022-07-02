<?php
/**
 * Project      tufu
 * @author      Giacomo Barbalinardo <info@ready24it.eu>
 * @copyright   2015
 */

use Tufu\Core\Environment;

$basePath = realpath(__DIR__ . '/../');
$environment = new Environment($basePath);


$config = [
    'view.adapter' => 'Tufu\Core\View\Adapter\TwigAdapter',
    'database' => [
        'driver'    => $environment->getEnv('DB_DRIVER'),
        'host'      => $environment->getEnv('DB_HOST'),
        'database'  => $environment->getEnv('DB_DATABASE'),
        'username'  => $environment->getEnv('DB_USERNAME'),
        'password'  => $environment->getEnv('DB_PASSWORD'),
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ],
    'basepath' => $basePath,
    'baseurl'  => $environment->getEnv('BASE_URL', ''),
    'debug'    => $environment->getEnv('APP_DEBUG', false),
    'jwt_pub_key' => $environment->getEnv('JWT_PUB_KEY', ''),
    'jwt_pri_key' => $environment->getEnv('JWT_PRI_KEY', ''),
    'jwt_expires_after' => $environment->getEnv('JWT_EXPIRES_AFTER', 20),
];
