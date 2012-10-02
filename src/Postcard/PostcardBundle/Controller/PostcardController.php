<?php

/**
 * This file is part of Postcard application
 *
 * (c) Jonathan Bensaid <john@bensaidj.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Postcard\PostcardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Postcard\PostcardBundle\Form\Type\PostcardType;
use Postcard\PostcardBundle\Entity\Postcard;

/**
 * Controller managing Postcard CRUD
 *
 * @author Jonathan Bensaid <john@bensaidj.com>
 */
class PostcardController extends Controller
{
    /**
     * Retrieve all the Postcards
     *
     * Retrieve the Postcards and present them from the oldest to the newest
     */
    public function indexAction()
    {
    	$postcardManager = $this->get('postcard_postcard.postcard_manager');
    	$postcards = $postcardManager->findPostcards();

    	$format = $this->getRequest()->getRequestFormat();

        return $this->render('PostcardPostcardBundle:Postcard:index.'.$format.'.twig',array(
        	'postcards'=>$postcards,
        ));
    }

    /**
     * Display one Postcard
     *
     * Display the Postcard identified by its id
     *
     * @param integer $id    The id of the requested Postcard
     */
    public function showAction($id)
    {
    	$postcardManager = $this->get('postcard_postcard.postcard_manager');
    	$postcard = $postcardManager->findPostcardById($id);

    	$format = $this->getRequest()->getRequestFormat();

    	return $this->render('PostcardPostcardBundle:Postcard:show.'.$format.'.twig',array(
    		'postcard'=>$postcard,
    	));
    }

    /**
     * Create a new Postcard
     *
     * Display the form associated with a new Postcard with a GET Request or treat the persistence of the Postcard with a POST Reques
     *
     * @param Request $request    The request object sent by the client
     */
    public function newAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $postcardManager = $this->get('postcard_postcard.postcard_manager');
        $postcard = $postcardManager->createPostcard($user);
        $form = $this->createForm(new PostcardType(), $postcard);

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if($form->isValid()) {
                $postcardManager->updatePostcard($postcard);

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
