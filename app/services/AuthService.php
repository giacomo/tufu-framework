<?php

namespace App\Service;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Tufu\Core\ConfigManager;

class AuthService
{
    public function login($user)
    {
        $payload = [
            'sub' => ['user'=> ['id' => $user->id, 'name' => $user->username]],
            'iat' => time(),
            'exp' => time() + (60 * ConfigManager::get('jwt_expires_after'))
        ];

        return JWT::encode($payload, ConfigManager::get('jwt_pub_key'), 'HS512');
    }

    /**
     * @param $token
     * @throws Exception
     */
    public function validate($token = '') {
        $token = str_replace('Bearer ', '', $token);

        if ($token === '') {
            throw new Exception('Token required.', 500);
        }

        return JWT::decode($token, new Key(ConfigManager::get('jwt_pub_key'), 'HS512'));
    }

    public function createNewToken($user)
    {
        $validUser = $user->sub->user;

        $payload = [
            'sub' => ['user'=> ['id' => $validUser->id, 'name' => $validUser->name]],
            'iat' => time(),
            'exp' => time() + (60 * ConfigManager::get('jwt_expires_after'))
        ];

        return JWT::encode($payload, ConfigManager::get('jwt_pub_key'), 'HS512');
    }
}
