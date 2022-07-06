<?php
/**
 * Project      tufu
 * @author      Giacomo Barbalinardo <info@ready24it.eu>
 * @copyright   2022
 */

use Tufu\Core\RouteManager;

$routesManager = RouteManager::getInstance();

$routesManager->addGetRoute('/', 'App\Controller\Home@welcomeAction');
$routesManager->addOptionsRoute('/api/{routes}', 'App\Controller\Preflight@optionsAction');
$routesManager->addGetRoute('/api/welcome', 'App\Controller\Api@indexAction');
$routesManager->addPostRoute('/api/login', 'App\Controller\Auth@loginAction');
$routesManager->addGetRoute('/api/protected', 'App\Controller\Api@protectedAction');
$routesManager->addGetRoute('/api/users', 'App\Controller\Api@usersAction');
$routesManager->addPostRoute('/api/posts', 'App\Controller\Api@createPostAction');

