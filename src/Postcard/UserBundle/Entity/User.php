<?php

namespace Postcard\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;

class User extends BaseUser
{
    /**
     * @var Database id
     */
	protected $id;

    /**
     * @var Facebook id if linked account
     */
    protected $facebookId;

    /**
     * @var User's firstname
     */
    protected $firstname;

    /**
     * @var User's lastname
     */
    protected $lastname;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $postcards;

    /**
     * Constructor
     */
    public function __construct()
    {
    	parent::__construct();
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
     * @param array $fbdata
     */
    public function setFBData($fbdata)
    {
        if (isset($fbdata['id'])) {
            $this->setFacebookId($fbdata['id']);
            $this->addRole('ROLE_FACEBOOK');
        }
        if (isset($fbdata['first_name'])) {
            $this->setFirstname($fbdata['first_name']);
        }
        if (isset($fbdata['last_name'])) {
            $this->setLastname($fbdata['last_name']);
        }
        if (isset($fbdata['email'])) {
            $this->setEmail($fbdata['email']);
        }

        return $this;
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

    /**
     * Set facebookId
     *
     * @param string $facebookId
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
}
