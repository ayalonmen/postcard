<?php

namespace Postcard\PostcardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostcardController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$postcards = $em->getRepository('PostcardPostcardBundle:Postcard')->findAll();

    	$format = $this->getRequest()->getRequestFormat();

        return $this->render('PostcardPostcardBundle:Postcard:index.'.$format.'.twig',array(
        	'postcards'=>$postcards,
        ));
    }

    public function showAction($id)
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$postcard = $em->getRepository('PostcardPostcardBundle:Postcard')->findOneById($id);

    	$format = $this->getRequest()->getRequestFormat();

    	return $this->render('PostcardPostcardBundle:Postcard:show.'.$format.'.twig',array(
    		'postcard'=>$postcard,
    	));
    }
}
