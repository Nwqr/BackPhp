<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(HttpFoundationRequest $request): Response
    {
        $form=$this->createForm(ContactFormType::class);
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()) {
                dump($form->getData());
            }

        return $this->render('contact/index.html.twig', [
            //'controller_name' => 'ContactController',
            'form'=>$form-> createView()
        ]);
    }
}
