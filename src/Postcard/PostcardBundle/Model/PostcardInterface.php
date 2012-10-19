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
	 * @param string $title
	 * @return PostcardInterface
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
	 * @return PostcardInterface
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
	 * @return PostcardInterface
	 */
	public function setBody($body);

	/**
	 * Get the body
	 *
	 * @return string
	 */
	public function getBody();

	/**
	 * Set the picture's filename
	 *
	 * @param string $picture
	 * @return PostcardInterface
	 */
	public function setPicture($picture);

	/**
	 * Get the picture's filename
	 *
	 * @return string
	 */
	public function getPicture();

	/**
     * Set created
     *
     * @param \DateTime $created
     * @return PostcardInterface
     */
    public function setCreated($created);

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated();

	/**
	 * Set the sender
	 *
	 * @param UserInterface $sender
	 * @return PostcardInterface
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

	/**
	 * Check the user is the sender
	 *
	 * @param UserInterface $user
	 * @return bool
	 */
	public function isSender(UserInterface $user);
}
