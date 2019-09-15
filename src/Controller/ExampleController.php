<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ExampleController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @Route(name="example_index", path="/example")
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $result = new JsonResponse([
            'message' => 'Hello'
        ]);

        return $result;
    }
}