<?php

/**
 * This file is part of Postcard application
 *
 * (c) Jonathan Bensaid <john@bensaidj.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Postcard\PostcardBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Postcard\PostcardBundle\Templating\Helper\PostcardHelper;
use Postcard\PostcardBundle\Model\PostcardInterface;

class PostcardExtension extends \Twig_Extension
{
	protected $container;

    /**
     * Constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

	/**
     * Returns a list of global functions to add to the existing list.
     *
     * @return array An array of global functions
     */
    public function getFunctions()
    {
    	return array(
    		'postcard_mini' => new \Twig_Function_Method($this, 'renderMini', array('is_safe' => array('html'))),
    		'postcard_mini_list' => new \Twig_Function_Method($this, 'renderMiniList', array('is_safe' => array('html'))),
    	);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'postcard_extension';
    }

    /*
     *
     */
    public function renderMini(PostcardInterface $postcard, $width = null)
    {
    	return $this->container->get('postcard_postcard.postcard_helper')->renderMini($postcard, $width);
    }

    /*
     *
     */
    public function renderMiniList($postcards, $frequency = 3)
    {
    	return $this->container->get('postcard_postcard.postcard_helper')->renderMiniList($postcards, $frequency);
    }
}
