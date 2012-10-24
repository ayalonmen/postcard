<?php

/**
 * This file is part of Postcard application
 *
 * (c) Jonathan Bensaid <john@bensaidj.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Postcard\PostcardBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\Templating\EngineInterface;
use Postcard\PostcardBundle\Model\PostcardInterface;

class PostcardHelper extends Helper
{
	protected $templating;

	public function __construct(EngineInterface $templating)
	{
		$this->templating = $templating;
	}

	public function renderMini(PostcardInterface $postcard, $width = null)
	{
		return $this->templating->render('PostcardPostcardBundle:Helper:mini.html.twig', array(
			'postcard' => $postcard,
			'width' => $width,
		));
	}

	public function renderMiniList($postcards, $frequency = 3)
	{
		return $this->templating->render('PostcardPostcardBundle:Helper:mini_list.html.twig', array(
			'postcards' => $postcards,
			'frequency' => $frequency,
		));
	}

	/**
     * @codeCoverageIgnore
     */
    public function getName()
    {
        return 'postcard_postcard.postcard_helper';
    }
}
