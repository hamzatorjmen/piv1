<?php

namespace Chaya3niUserBundle\Controller;

use Chaya3niUserBundle\Entity\Ridepackage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('Chaya3niUserBundle:Default:index.html.twig');
    }
    public function userpageAction()
    {
        return $this->render('Chaya3niUserBundle:Default:indexuser.html.twig');
    }

    public function employeepageAction()
    {
        return $this->render('Chaya3niUserBundle:Default:indexemployee.html.twig');
    }

    public function adminpageAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $ridepackages = $em->getRepository('Chaya3niUserBundle:Ridepackage')->findAll();
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM Chaya3niUserBundle:Ridepackage a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1),$request->query->getInt('limit',5));
        return $this->render('Chaya3niUserBundle:Default:indexadmin.html.twig', array(
            'ridepackages' => $ridepackages,
            'pagination' => $pagination,
        ));
    }
    public function deletepackageAction(Request $request, Ridepackage $ridepackage) {
        $body = "En raison de sécurité/réclamation, nous avons supprimé votre demande de couvoiturage du marchandise" + $ridepackage->getTypepackage() ;
        $message = \Swift_Message::newInstance()
            ->setSubject("Chaya3ni Marchandise")
            ->setFrom("hamzatorjmen@gmail.com")
            ->setTo("hamza.torjmen@esprit.tn")
            ->setBody($body);
        $this->get('mailer')->send($message);
        $em = $this->getDoctrine()->getManager();
        $em->remove($ridepackage);
        $em->flush();
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM Chaya3niUserBundle:Ridepackage a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1),$request->query->getInt('limit',10));
        return $this->render('Chaya3niUserBundle:Default:indexadmin.html.twig',array(
            'pagination' => $pagination
        ) ) ;
    }
    public function representantpageAction()
    {
        return $this->render('Chaya3niUserBundle:Default:indexrepresentant.html.twig');
    }

}
