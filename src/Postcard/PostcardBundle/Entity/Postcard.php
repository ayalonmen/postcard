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
