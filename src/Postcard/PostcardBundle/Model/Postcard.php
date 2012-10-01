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
 * Storage agnostic postcard object
 *
 * @author Jonathan Bensaid <john@bensaidj.com>
 */
abstract class Postcard implements PostcardInterface
{
	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $location;

	/**
	 * @var string
	 */
	protected $body;

	/**
	 * The picture's link
	 *
	 * @var string
	 */
	protected $picture;

	/**
	 * The picture's data file
	 * This is just to be used in forms, it shouldn't be persisted
	 *
	 * @var data
	 */
    protected $pictureFile;

    /**
     * @var UserInterface
     */
    protected $sender;

    /**
     * Set title
     *
     * @param string $title
     * @return PostcardInterface
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return PostcardInterface
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return PostcardInterface
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set picture's link
     *
     * @param string $picture
     * @return PostcardInterface
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture's link
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Get the picture's data
     *
     * @return data
     */
    public function getPictureFile()
    {
        return $this->pictureFile;
    }

    /**
     * Set the picture's data
     *
     * @return PostcardInterface
     */
    public function setPictureFile($pictureFile)
    {
        $this->pictureFile = $pictureFile;

        return $this;
    }

    /**
     * Set sender
     *
     * @param UserInterface $sender
     * @return Postcard
     */
    public function setSender(UserInterface $sender = null)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return UserInterface
     */
    public function getSender()
    {
        return $this->sender;
    }
}
