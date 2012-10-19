<?php

/**
 * This file is part of Postcard application
 *
 * (c) Jonathan Bensaid <john@bensaidj.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Postcard\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Controller managing navigation into public area
 *
 * @author Jonathan Bensaid <john@bensaidj.com>
 */
class PublicController extends Controller
{
	/**
	 * Display the Homepage
	 */
	public function homepageAction()
	{
		return $this->render('PostcardPublicBundle:Public:homepage.html.twig');
	}
}
