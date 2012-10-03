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

use Postcard\PostcardBundle\Model\Postcard as Base;
use FOS\UserBundle\Model\UserInterface;

class Postcard extends Base
{
	protected $id;

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
     * @var string $title
     */
    protected $title;

    /**
     * @var string $location
     */
    protected $location;

    /**
     * @var string $body
     */
    protected $body;

    /**
     * @var string $picture
     */
    protected $picture;

    /**
     * @var FOS\UserBundle\Model\UserInterface
     */
    protected $sender;


    /**
     * Set title
     *
     * @param string $title
     * @return Postcard
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
     * @return Postcard
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
     * @return Postcard
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
     * Set picture
     *
     * @param string $picture
     * @return Postcard
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
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
}
