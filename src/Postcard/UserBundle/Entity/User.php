<?php

namespace Postcard\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;

class User extends BaseUser
{
	protected $id;
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $postcards;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->postcards = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Add postcards
     *
     * @param Postcard\PostcardBundle\Entity\Postcard $postcards
     * @return User
     */
    public function addPostcard(\Postcard\PostcardBundle\Entity\Postcard $postcards)
    {
        $this->postcards[] = $postcards;

        return $this;
    }

    /**
     * Remove postcards
     *
     * @param Postcard\PostcardBundle\Entity\Postcard $postcards
     */
    public function removePostcard(\Postcard\PostcardBundle\Entity\Postcard $postcards)
    {
        $this->postcards->removeElement($postcards);
    }

    /**
     * Get postcards
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getPostcards()
    {
        return $this->postcards;
    }
}
