<?php
/**
 * Project      tufu
 * @author      Giacomo Barbalinardo <info@ready24it.eu>
 * @copyright   2019
 */

namespace App\Interceptor;


use App\Service\AuthService;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Tufu\Core\AbstractRequestInterceptor;

class JwtRequestInterceptor extends AbstractRequestInterceptor
{

    /**
     * @param $request Request
     * @throws Exception
     */
    function beforeRequest(&$request)
    {
        try {
            $authToken = $request->headers->get('Authorization', '');
            $authService = new AuthService();
            $authService->validate($authToken);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
