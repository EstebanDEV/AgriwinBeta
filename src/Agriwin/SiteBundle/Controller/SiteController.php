<?php

namespace Agriwin\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteController extends Controller
{
    public function indexAction()
    {
        $content = $this
            ->get('templating')
            ->render('AgriwinSiteBundle:Site:index.html.twig');
    
        return new Response($content);
    }

    public function avantagesAction()
    {
        $content = $this
            ->get('templating')
            ->render('AgriwinSiteBundle:Site:avantages.html.twig');
    
        return new Response($content);
    }

    public function tarifsAction()
    {
        $content = $this
            ->get('templating')
            ->render('AgriwinSiteBundle:Site:tarifs.html.twig');
    
        return new Response($content);
    }

    public function avisAction()
    {
        $content = $this
            ->get('templating')
            ->render('AgriwinSiteBundle:Site:avis.html.twig');
    
        return new Response($content);
    }

    public function contactAction(Request $request)
    {
        $form = $this->createForm('Agriwin\SiteBundle\Form\ContactType', null, array(
            'action' => $this->generateUrl('agriwin_site_contact'),
            'method' => 'POST'
        ));

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {

                if($this->sendMail($form->getData())) {
                    
                    return $this->redirectToRoute('agriwin_site_homepage');
                  
                } else {
                    
                    var_dump('Erreur');
                }
            }
        }

        return $this->render('AgriwinSiteBundle:Site:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }

    private function sendMail($data) {
        $agriwinContactMail = 'esteban14320@gmail.com';
        $agriwinContactPassword = 'hacktoxic98';

        $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
            ->setUsername($agriwinContactMail)
            ->setPassword($agriwinContactPassword);

        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance($data['subject'])
            ->setFrom(array($data['email'] => 'Message de '.$data['name']))
            ->setTo(array($agriwinContactMail))
            ->setBody($this->renderView('AgriwinSiteBundle:Email:contact.txt.twig', array(
                'message' => $data['message'],
                'society' => $data['society'],
                'mobile'  => $data['mobile'],
                'email'   => $data['email'],
                'name'    => $data['name']
            )))
        ;

        return $mailer->send($message);
    }

    public function mentionsLegalesAction()
    {
        $content = $this
            ->get('templating')
            ->render('AgriwinSiteBundle:Site:mentions-legales.html.twig');
    
        return new Response($content);
    }

    public function politiqueConfidentialiteAction()
    {
        $content = $this
            ->get('templating')
            ->render('AgriwinSiteBundle:Site:politique-confidentialite.html.twig');
    
        return new Response($content);
    }
}