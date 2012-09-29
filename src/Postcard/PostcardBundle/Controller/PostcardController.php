<?php

namespace Postcard\PostcardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostcardController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$postcards = $em->getRepository('PostcardPostcardBundle:Postcard')->findAll();

        return $this->render('PostcardPostcardBundle:Postcard:index.html.twig',array(
        	'postcards'=>$postcards,
        ));
    }
}
