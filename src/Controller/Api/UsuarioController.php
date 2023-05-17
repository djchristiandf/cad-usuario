<?php

namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api/users", name: "api_v1_user_")]
class UsuarioController
{
    #[Route('/lista', methods: ['GET'], name: 'lista')]
    public function list(): JsonResponse
    {
        return new JsonResponse(["implement list na API", 404]);
    }

    #[Route('/cadastra', methods: ['POST'], name: 'cadastra')]
    public function cadastra(): JsonResponse
    {
        return new JsonResponse(["implement cadast API", 404]);
    }
}