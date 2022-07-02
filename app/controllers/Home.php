<?php
/**
 * Project      tufu-framework
 * @author      Giacomo Barbalinardo <info@ready24it.eu>
 * @copyright   2022
 */

namespace App\Controller;

use Tufu\Core\Controller;

class Home extends Controller{

    public function welcomeAction()
    {
        return $this->render('welcome.twig');
    }
}
