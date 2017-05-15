<?php

namespace Chaya3niUserBundle\Controller;

use Chaya3niUserBundle\Entity\Ridepackage;
use Chaya3niUserBundle\Entity\Ridepassenger;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ridepackage controller.
 *
 */
class RidepackageController extends Controller
{
    /**
     * Lists all ridepackage entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $ridepackages = $em->getRepository('Chaya3niUserBundle:Ridepackage')->findAll();
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM Chaya3niUserBundle:Ridepackage a WHERE a.iduser=:user_id";
        $query = $em->createQuery($dql)->setParameter('user_id', $this->getUser());

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1),$request->query->getInt('limit',6));
        return $this->render('ridepackage/index.html.twig', array(
            'ridepackages' => $ridepackages,
            'pagination' => $pagination,
        ));
    }

    /**
     * Creates a new ridepackage entity.
     *
     */
    public function newAction(Request $request)
    {
        $ridepackage = new Ridepackage();
        $ridepassenger = new Ridepassenger() ;
        $form = $this->createForm('Chaya3niUserBundle\Form\RidepackageType', $ridepackage);
        $form->handleRequest($request);
        $repository = $this->getDoctrine()->getRepository('Chaya3niUserBundle:Ridepassenger') ;
        $trajets = $repository->findAll() ;
        if ($request->isMethod('POST')) {
            $idtrajet = $request->request->get('idtrajet') ;
            $param =$request->request->all() ;
            var_dump($param) ;
            echo "<script>alert('".$idtrajet."')</script>" ;
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $ridepassenger = $repository->find($idtrajet) ;
            $ridepackage->setIdtrajet($ridepassenger) ;
            $ridepackage->setIduser($this->getUser()) ;
            $em = $this->getDoctrine()->getManager();
            $em->persist($ridepackage);
            $em->flush($ridepackage);
            return $this->redirectToRoute('ridepackage_show', array('id' => $ridepackage->getIdPackage()));
        }
        return $this->render('ridepackage/new.html.twig', array(
            'ridepackage' => $ridepackage,
            'form' => $form->createView(),
            'trajets' => $trajets
        ));
    }

    /**
     * Finds and displays a ridepackage entity.
     *
     */
    public function showAction(Ridepackage $ridepackage)
    {
        $deleteForm = $this->createDeleteForm($ridepackage);
        $repository = $this->getDoctrine()->getRepository('Chaya3niUserBundle:Ridepassenger') ;
        $trajet = $repository->find($ridepackage->getIdtrajet()) ;
        return $this->render('ridepackage/show.html.twig', array(
            'ridepackage' => $ridepackage,
            'trajet' => $trajet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ridepackage entity.
     *
     */
    public function editAction(Request $request, Ridepackage $ridepackage)
    {
        $ridepassenger = new Ridepassenger() ;
        $repository = $this->getDoctrine()->getRepository('Chaya3niUserBundle:Ridepassenger') ;
        if ($request->isMethod('POST')) {
            $ridepassenger = $repository->find($request->request->get('idtrajet')) ;
            $ridepackage->setIdtrajet($ridepassenger) ;
        }
        $ridepassenger = $repository->find($ridepackage->getIdtrajet()) ;
        $deleteForm = $this->createDeleteForm($ridepackage);
        $editForm = $this->createForm('Chaya3niUserBundle\Form\RidepackageType', $ridepackage);
        $editForm->handleRequest($request);
        $trajets = $repository->findAll() ;
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ridepackage_show', array('id' => $ridepackage->getIdPackage()));
        }

        return $this->render('ridepackage/edit.html.twig', array(
            'ridepackage' => $ridepackage,
            'edit_form' => $editForm->createView(),
            'ride' => $ridepassenger,
            'trajets' => $trajets,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ridepackage entity.
     *
     */
    public function deleteAction(Request $request, Ridepackage $ridepackage)
    {
        echo "<script>alert('loool')</script>";
        $form = $this->createDeleteForm($ridepackage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ridepackage);
            $em->flush();
        }

        return $this->redirectToRoute('ridepackage_index');
    }

    /**
     * Creates a form to delete a ridepackage entity.
     *
     * @param Ridepackage $ridepackage The ridepackage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ridepackage $ridepackage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ridepackage_delete', array('id' => $ridepackage->getIdPackage())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
