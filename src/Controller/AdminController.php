<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Biens;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        $biens = $this->getDoctrine()
    	              ->getRepository(biens::class)
    	              ->findAll();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminlController',
            'biens'=>$biens
        ]);
    }

    /**
     * @Route("/admin/{id}", name="admin_bien")
     */
    public function modifierProduit($id,Request $request) {
    	$bien = $this->getDoctrine()
    	              ->getRepository(biens::class)
    	              ->find($id);

    	$form = $this->createFormBuilder($bien)
    		->add('title',TextType::class)
    		->add('picture',TextType::class)
            ->add('surface',NumberType::class)
            ->add('price',NumberType::class)
            ->add('modifier',SubmitType::class)
            ->getForm();
            
            $form->handleRequest($request);

	    if ($form->isSubmitted() && $form->isValid()) {
	        // $form->getData() holds the submitted values
	        // but, the original `$task` variable has also been updated
	        $bien = $form->getData();

	        // ... perform some action, such as saving the task to the database
	        // for example, if Task is a Doctrine entity, save it!
	         $entityManager = $this->getDoctrine()->getManager();
	         //$entityManager->persist($bien);
	         $entityManager->flush();

	        return $this->redirectToRoute('admin');
	    }

        return $this->render('formulaire/index.html.twig', [
           'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/delete/{id}", name="delete_procuit")
     */
    public function delete(Biens $bien) {
    	$sup = $this->getDoctrine()
    			    ->getManager();
        $sup->remove($bien);
        $sup->flush();
		
		return $this->redirectToRoute('admin');
    }

}