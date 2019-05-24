<?php

namespace App\Controller;

use App\Entity\Biens;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(PaginatorInterface $paginator,Request $request)
    {
        

    	$biens = $paginator->paginate( $this->getDoctrine()
                      ->getRepository(biens::class)
                      ->findAll(),
                      $request->query->getInt('page', 1),
                      12
                  );
                      
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'biens'=>$biens           
        ]);


    }
}
