<?php

namespace App\Controller;

use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/", name:"web_usuario_")]
class UsuarioController extends AbstractController
{
    #[Route('/', methods: ['GET'], name: 'index')]
    public function index() : Response
    {
        return $this->render('usuario/form.html.twig', [
            'fulano' => "Christian"
        ]);
    }

    #[Route('/salvar', methods: ['POST'], name : 'salvar')]
    public function salvar(Request $request, EntityManagerInterface $entityManager): Response
    {
        // dump($request->request->ALL());
        $data = $request->request->ALL();

        $usuario = new Usuario();
        $usuario->setNome($data['nome']);
        $usuario->setEmail($data['email']);

        dump($usuario);
        $entityManager->persist($usuario);
        $entityManager->flush();
        dump($usuario);

        
        if($usuario->getId()) //outra opcao de verificar se persistiu no db $entityManager->contains($usuario)
        {
            return $this->render("usuario/sucessform.html.twig", [
                'fulano' => $data['nome']
            ]);
        }else{
            return $this->render("usuario/errorform.html.twig", [
                'fulano' => $data['nome']
            ]);
        }

        
    }
}