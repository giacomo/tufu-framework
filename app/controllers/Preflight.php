<?php
/**
 * Project      tufu
 * @author      Giacomo Barbalinardo <info@ready24it.eu>
 * @copyright   2019
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Tufu\Core\Controller;

class Preflight extends Controller
{
    public function optionsAction()
    {
        $headers = array(
            'Access-Control-Allow-Methods' => 'POST, GET, PUT, PATCH, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type',
            'Access-Control-Allow-Origin'  => $this->request->headers->get('origin')
        );

        return new Response(null, 200, $headers);
    }
}
