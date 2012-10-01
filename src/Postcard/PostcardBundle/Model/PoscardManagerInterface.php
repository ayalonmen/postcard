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
 * Interface to be implemented by postcard managers.
 *
 * All changes through a postcard should happen through this interface
 *
 * @author Jonathan Bensaid <john@bensaidj.com>
 */
interface PostcardManagerInterface
{
	/**
	 * Create a basic postcard instance
	 *
	 * @param UserInterface $sender optional A user can be defined as the sender of the postcard
	 *
	 * @return PostcardInterface
	 */
	public function createPostcard(UserInterface $sender = null);

	/**
	 * Update a postcard
	 *
	 * @param PostcardInterface $postcard
	 */
	public function updatePostcard(PostcardInterface $postcard);

	/**
	 * Delete a postcard
	 *
	 * @param PostcardInterface $postcard
	 */
	public function deletePostcard(PostcardInterface $postcard);

	/**
	 * Find a postcard by the given criteria
	 *
	 * @param array $criteria
	 *
	 * @return array of PostcardInterface
	 */
	public function findPostcardsBy(array $criteria);

	/**
	 * Find all postcards by a given sender
	 *
	 * @param UserInterface $sender
	 *
	 * @return array of PostcardInterface
	 */
	public function findPostcardsBySender(UserInterface $sender);

	/**
	 * Retrieve all postcards
	 *
	 * @return array of PostcardInterface
	 */
	public function findPostcards();

	/**
	 * Upload the picture
	 * If the property $pictureFile is null, should not upload anything
	 *
	 * @param PostcardInterface $postcard
	 */
	public function uploadPicture(PostcardInterface $postcard);

	/**
     * Returns the postcard's fully qualified class name.
     *
     * @return string
     */
    public function getClass();
}
