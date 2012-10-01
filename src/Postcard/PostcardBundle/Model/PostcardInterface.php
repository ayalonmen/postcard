<?php

/**
 * This file is part of Postcard application
 *
 * (c) Jonathan Bensaid <john@bensaidj.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Postcard\PostcardBundle\Model;

use FOS\UserBundle\Model\UserInterface;

/**
 * Interface defining the basic properties (through getters/setters) that a Postcard should have
 *
 * @author Jonathan Bensaid <john@bensaidj.com>
 */
interface PostcardInterface
{
	/**
	 * Return the id of the postcard
	 *
	 * @return integer
	 */
	public function getId();

	/**
	 * Set the title
	 *
	 * @param string title
	 */
	public function setTitle($tile);

	/**
	 * Get the title
	 *
	 * @return string
	 */
	public function getTitle();

	/**
	 * Set the location
	 *
	 * @param string $location
	 */
	public function setLocation($location);

	/**
	 * Get the location
	 *
	 * @return string
	 */
	public function getLocation();

	/**
	 * Set the body
	 *
	 * @param string $body
	 */
	public function setBody($body);

	/**
	 * Get the body
	 *
	 * @return string
	 */
	public function getBody();

	/**
	 * Set the picture's url
	 *
	 * @param string $picture
	 */
	public function setPicture($picture);

	/**
	 * Get the picture's url
	 *
	 * @return string
	 */
	public function getPicture();

	/**
	 * Set the sender
	 *
	 * @param UserInterface $sender
	 */
	public function setSender(UserInterface $sender);

	/**
	 * Get the sender
	 *
	 * @return UserInterface
	 */
	public function getSender();

	/**
	 * Get the URI of the picture
	 *
	 * @return string
	 */
	public function getPictureUri();

	/**
	 * Get the URL of the picture
	 *
	 * @return string
	 */
	public function getPictureUrl();
}
