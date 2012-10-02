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

use Postcard\PostcardBundle\Model\PostcardManager as BaseManager;
use Postcard\PostcardBundle\Model\PostcardInterface;
use Doctrine\ORM\EntityManager;

class PostcardManager extends BaseManager
{
	/**
	 * @var Doctrine Entity Manager
	 */
	protected $em;

	/**
	 * @var Postcard Fully Qualified Class
	 */
	protected $class;

	/**
	 * @var The Postcard Repository
	 */
	protected $repository;

	public function __construct(EntityManager $em, $class)
	{
		$this->em = $em;
		$this->repository = $em->getRepository($class);
		$this->class = $class;
	}

	/**
	 * Update a postcard
	 *
	 * @param PostcardInterface $postcard
	 * @param bool $flush optional
	 */
	public function updatePostcard(PostcardInterface $postcard, $flush = true)
	{
		$this->uploadPicture($postcard);
		$this->em->persist($postcard);

		if ($flush) {
			$this->em->flush();
		}
	}

	/**
	 * Delete a postcard
	 *
	 * @param PostcardInterface $postcard
	 * @param bool $flush optional
	 */
	public function deletePostcard(PostcardInterface $postcard, $flush = true)
	{
		$this->deletePicture($postcard);
		$this->em->remove($postcard);

		if ($flush) {
			$this->em->flush();
		}
	}

	/**
	 * Find a postcard by the given criteria
	 *
	 * @param array $criteria
	 *
	 * @return array of PostcardInterface
	 */
	public function findPostcardsBy(array $criteria)
	{
		return $this->repository->findBy($criteria);
	}

	/**
	 * Find one postcard by id
	 *
	 * @param interger $id
	 *
	 * @return PostcardInterface
	 */
	public function findPostcardById($id)
	{
		return $this->repository->findOneById($id);
	}

	/**
	 * Retrieve all postcards
	 *
	 * @return array of PostcardInterface
	 */
	public function findPostcards()
	{
		return $this->repository->findAll();
	}

	/**
     * Returns the postcard's fully qualified class name.
     *
     * @return string
     */
    public function getClass()
    {
    	return $this->class;
    }
}
