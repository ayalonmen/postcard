<?php

namespace Postcard\PostcardBundle\Entity;

use Postcard\PostcardBundle\Model\Postcard as Base;

class Postcard extends Base
{
	private $id;

	private $title;

	private $location;

	private $body;

	private $picture;

    private $pictureFile;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function getPictureFile()
    {
        return $this->pictureFile;
    }

    public function setPictureFile($pictureFile)
    {
        $this->pictureFile = $pictureFile;
    }

    public function getUploadRootDir()
    {
        return __DIR__ . "/../../../../web/" . $this->getUploadDir();
    }

    public function getUploadDir()
    {
        return 'uploads/postcards/';
    }

    public function getAbsolutePath()
    {
        return null === $this->picture ? null : $this->getUploadRootDir() . $this->picture;
    }

    public function getWebPath()
    {
        return null === $this->picture ? null : $this->getUploadDir() . $this->picture;
    }

    public function upload()
    {
        if ($this->pictureFile === null) {
            return;
        }

        $this->pictureFile->move($this->getUploadRootDir(), $this->pictureFile->getClientOriginalName());
        $this->picture = $this->pictureFile->getClientOriginalName();
        $this->pictureFile = null;
    }
}
