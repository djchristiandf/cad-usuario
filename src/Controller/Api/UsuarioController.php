<?php

namespace App\Controller\Api;

use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api/users", name: "api_v1_user_")]
class UsuarioController extends AbstractController
{
    #[Route('/lista', methods: ['GET'], name: 'lista')]
    public function list(UsuarioRepository $usuarioRepository): JsonResponse
    {
        //dump($usuarioRepository->findAll());
        return new JsonResponse($usuarioRepository->findAll());
    }

    #[Route('/cadastra', methods: ['POST'], name: 'cadastra')]
    public function cadastra(Request $request, UsuarioRepository $usuarioRepository): JsonResponse
    {
        $data = $request->request->ALL();

        $usuario = new Usuario();
        $usuario->setNome($data['nome']);
        $usuario->setEmail($data['email']);
        
        $usuarioRepository->persist($usuario);
        $usuarioRepository->flush();
                
        if($usuario->getId()) 
        {
            return new  JsonResponse($usuario, 200); 
        }else{
            return new  JsonResponse("falha ao inserir", 404); 
        }        
    }
}