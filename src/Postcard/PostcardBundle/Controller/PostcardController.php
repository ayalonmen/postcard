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
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

use Postcard\PostcardBundle\Form\Type\PostcardNewType;
use Postcard\PostcardBundle\Form\Type\PostcardEditType;
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
     * Display the form associated with a new Postcard with a GET Request or treat the persistence of the Postcard with a POST Request
     */
    public function newAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $request = $this->get('request');

        $postcardManager = $this->get('postcard_postcard.postcard_manager');
        $postcard = $postcardManager->createPostcard($user);

        $form = $this->createForm(new PostcardNewType(), $postcard);

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

    /**
     * Edit a postcard
     *
     * Only the Sender of the postcard can edit it
     *
     * @param integer $id The id of the Postcard object
     */
    public function editAction($id)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $request = $this->get('request');

        $postcardManager = $this->get('postcard_postcard.postcard_manager');
        $postcard = $postcardManager->findPostcardById($id);

        $form = $this->createForm(new PostcardEditType(), $postcard);

        if (!$postcard->isSender($user)) {
            throw new AccessDeniedHttpException();
        }

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $postcardManager->updatePostcard($postcard);

                return $this->redirect($this->generateUrl('postcard_postcard_show', array(
                    'id'=>$postcard->getId(),
                )));
            }
        }

        return $this->render('PostcardPostcardBundle:Postcard:edit.html.twig', array(
            'form' => $form->createView(),
            'postcard' => $postcard,
        ));
    }
}
