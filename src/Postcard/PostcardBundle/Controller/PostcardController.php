<?php

namespace Postcard\PostcardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Postcard\PostcardBundle\Form\Type\PostcardType;
use Postcard\PostcardBundle\Entity\Postcard;

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

    public function newAction(Request $request)
    {
        $postcard = new Postcard();
        $form = $this->createForm(new PostcardType(), $postcard);

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($postcard);
                $em->flush();

                return $this->redirect($this->generateUrl('postcard_postcard_show', array(
                    'id'=>$postcard->getId(),
                )));
            }
        }

        return $this->render('PostcardPostcardBundle:Postcard:new.html.twig',array(
            'form'=>$form->createView(),
        ));
    }
}
