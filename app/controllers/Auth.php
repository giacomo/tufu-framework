<?php
/**
 * Project      tufu-framework
 * @author      Giacomo Barbalinardo <info@ready24it.eu>
 * @copyright   2022
 */

namespace App\Controller;

use App\Model\User;
use App\Service\AuthService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Tufu\Core\Controller;

class Auth extends Controller
{
    public function loginAction()
    {
        $username =$this->request->get('username');
        $code = $this->request->get('code');

        try {
            $user = User::where('username',$username)->firstOrFail();

            if (!password_verify($code, $user->code)) {
                throw new \Exception('Invalid password');
            }

            $auth = new AuthService();
            $token = $auth->login($user);

            return new JsonResponse(['token' => $token]);
        } catch (\Exception $e) {
        }

        return new JsonResponse(['error' => 'error login'], 500);
    }
}
