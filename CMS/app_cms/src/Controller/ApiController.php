<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UsersRepository;

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="api")
     */
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }


    /**
     * @Route("/api/registration", name="api_registration")
     */
    public function api_registration(Request $request, UsersRepository $usersRepository): Response
    {

      $login = $request->request->get('login');
      $pass = $request->request->get('pass');

      $make_user = $usersRepository->new($login, $pass);

      if($make_user == 'ok'){
        $response = 'ok';
      } else {
        $response = 'error';
      }

      return new Response($response);

    }

}
