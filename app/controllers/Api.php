<?php
/**
 * Project      tufu-framework
 * @author      Giacomo Barbalinardo <info@ready24it.eu>
 * @copyright   2022
 */

namespace App\Controller;

use App\Model\Post;
use App\Model\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Tufu\Core\Controller;

class Api extends Controller
{
    public function indexAction()
    {
        return new JsonResponse(['message' => 'Welcome, to your new project with tufu-framework']);
    }

    /**
     * @ResponseListener('App\Interceptor\JwtResponseInterceptor')
     * @RequestListener('App\Interceptor\JwtRequestInterceptor')
     */
    public function protectedAction()
    {
       return new JsonResponse(['message' => 'Welcome to our protected route']);
    }

    /**
     * @ResponseListener('App\Interceptor\JwtResponseInterceptor')
     * @RequestListener('App\Interceptor\JwtRequestInterceptor')
     */
    public function usersAction()
    {
       $users = User::all();

       return new JsonResponse(['users' => $users]);
    }

    /**
     * @ResponseListener('App\Interceptor\JwtResponseInterceptor')
     * @RequestListener('App\Interceptor\JwtRequestInterceptor')
     */
    public function createPostAction()
    {
        $title = $this->request->get('title', '');
        $description = $this->request->get('description');

        if (strlen($title) < 4) {
            throw new \InvalidArgumentException('Invalid title provided');
        }

        $post = new Post([
            'title' => $title,
            'description' => $description
        ]);

        if ($post->save()) {
            return new JsonResponse(['post' => $post]);
        }

        return new JsonResponse(['error' => 'Invalid'], 500);
    }
}
