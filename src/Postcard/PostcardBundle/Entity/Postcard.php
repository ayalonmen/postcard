<?php

/**
 * This file is part of Postcard application
 *
 * (c) Jonathan Bensaid <john@bensaidj.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Postcard\PostcardBundle\Entity;

use Postcard\PostcardBundle\Model\PostcardInterface;
use FOS\UserBundle\Model\UserInterface;

class Postcard Implements PostcardInterface
{
    /**
     * The id in the DB
     *
     * @var integer $id
     */
	protected $id;

    /**
     * Title of the Postcard
     *
     * @var string $title
     */
    protected $title;

    /**
     * The place where the Postcard was taken
     *
     * @var string $location
     */
    protected $location;

    /**
     * A message about the Postcard published by the sender
     *
     * @var string $body
     */
    protected $body;

    /**
     * The picture's filename
     *
     * @var string $picture
     */
    protected $picture;

    /**
     * The picture's data file
     * This is just to be used in forms, it shouldn't be persisted
     *
     * @var data $pictureFile
     */
    protected $pictureFile;

    /**
     * @var \DateTime $created
     */
    protected $created;

    /**
     * @var \DateTime $updated
     */
    protected $updated;

    /**
     * @var FOS\UserBundle\Model\UserInterface
     */
    protected $sender;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

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
     * @param FOS\UserBundle\Model\UserInterface $sender
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
     * @return FOS\UserBundle\Model\UserInterface $sender
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Check the user is the sender
     *
     * @param UserInterface $user
     * @return bool
     */
    public function isSender(UserInterface $user)
    {
        return $this->sender === $user;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Postcard
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Postcard
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Get the URI of the picture
     *
     * @return string
     */
    public function getPictureUri()
    {
        return '/uploads/postcards/' . $this->picture;
    }

    /**
     * Get the URL of the picture
     *
     * @return string
     */
    public function getPictureUrl()
    {
        return 'http://local.postcard.com' . $this->getPictureUri();
    }
}
