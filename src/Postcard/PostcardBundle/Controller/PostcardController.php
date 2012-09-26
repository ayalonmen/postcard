<?php

namespace Postcard\PostcardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostcardController extends Controller
{
    public function indexAction()
    {
        return $this->render('PostcardPostcardBundle:Postcard:index.html.twig');
    }
}
