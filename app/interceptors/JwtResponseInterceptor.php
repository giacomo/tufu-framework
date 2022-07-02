<?php
/**
 * Project      tufu
 * @author      Giacomo Barbalinardo <info@ready24it.eu>
 * @copyright   2019
 */

namespace App\Interceptor;

use App\Service\AuthService;
use Firebase\JWT\JWT;
use Tufu\Core\AbstractResponseInterceptor;
use Tufu\Core\ConfigManager;

class JwtResponseInterceptor extends AbstractResponseInterceptor
{

    function beforeResponse(&$response, &$request)
    {
        try {
            $authToken = $request->headers->get('Authorization', '');
            $authService = new AuthService();
            $user =$authService->validate($authToken);

            $authService->createNewToken($user);

        } catch (Exception $e) {
            throw $e;
        }


        $payload = [
            'sub' => ['user'=> ['id' => 42, 'name' => 'test-user']], 
            'iat' => time(),
            'exp' => time() + (60 * ConfigManager::get('jwt_expires_after')) // Expire after 20 minutes
        ];

        $token = JWT::encode($payload, ConfigManager::get('jwt_pub_key'), 'HS512');
        $response->headers->add(['X-Auth-Token'=> $token]);
    }
}
