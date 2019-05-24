<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
    	$contact = new Contact();
    	$form = $this->createFormBuilder($contact)
    			->add('mail',EmailType::class)
    			->add('subject',TextType::class)
            	->add('message',TextareaType::class)
            	->add('envoyer',SubmitType::class)
            	->getForm();
    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()) {

    		
    			$donnee = $form->getData();
    			dump($donnee);

			    $message = (new \Swift_Message('Hello Email'))
					        ->setFrom('send@example.com')
					        ->setTo('samy.aformac2018@gmail.com')
					        ->setBody(
		            $this->render(
		                // templates/emails/registration.html.twig
		                'contact/mail.html.twig', [
		                	'donnee' => $donnee
		                ]),
		            'text/html'
		        	);

       
    

			    $mailer->send($message);

			  
			
    	}

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView()
        ]);
    }


}
