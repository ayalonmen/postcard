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
 * Abstract user manager implementation which can be use
 * for a concrete manager implementation
 *
 * @author Jonathan Bensaid <john@bensaidj.com>
 */
abstract class PostcardManager implements PostcardManagerInterface
{
	/**
	 * Create a basic postcard instance
	 *
	 * @param UserInterface $sender The user defined as the sender of the postcard
	 *
	 * @return PostcardInterface
	 */
	public function createPostcard(UserInterface $sender)
	{
		$class = $this->getClass();
		$instance = new $class;
		$instance->setSender($sender);

		return $instance;
	}

	/**
	 * Find all postcards by a given sender
	 *
	 * @param UserInterface $sender
	 *
	 * @return array of PostcardInterface
	 */
	public function findPostcardsBySender(UserInterface $sender)
	{
		return $this->findPostcardsBy(array('sender' => $sender));
	}

	/**
	 * Upload the picture
	 * If the property $pictureFile is null, should not upload anything
	 *
	 * @param PostcardInterface $postcard
	 */
	public function uploadPicture(PostcardInterface $postcard)
	{
		if ($postcard->getPictureFile() === null) {
			return;
		}

		$pictureName = $this->generatePictureName($postcard);
		$postcard->getPictureFile()->move($this->getUploadDir(), $pictureName);
		$postcard->setPicture($pictureName);

	}

	/**
	 * Generate a unique name for the uploaded picture
	 *
	 * @param PostcardInterface $postcard
	 */
	protected function generatePictureName(PostcardInterface $postcard)
	{
		$senderUsername = $postcard->getSender()->getUsername();

		//Make the assumption that the Mime is of type image/xxx
		if ($pictureExtension = substr($postcard->getPictureFile()->getClientMimeType(), 6)) {
			return md5($senderUsername . time()) . '.' . $pictureExtension;
		}

		return md5($senderUsername . time());
	}

	/**
	 * Retrieve the folder where the picture should be saved
	 *
	 * @return string
	 */
	protected function getUploadDir()
	{
		return __DIR__ . '/../../../../web/uploads/postcards/';
	}
}
