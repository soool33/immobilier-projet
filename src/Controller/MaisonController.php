<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Biens;

class MaisonController extends AbstractController
{
    /**
     * @Route("/maison/{id}", name="maison")
     */
    public function index($id)
    {
    	$maison = $this->getDoctrine()
    	              ->getRepository(biens::class)
    	              ->find($id);
    	              dump($maison);
        return $this->render('maison/index.html.twig', [
            'maison' => $maison
        ]);
    }
}
