<?php
namespace Postcard\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Postcard\UserBundle\Entity\User;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
	private $container;

	private $userManager;

	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
		$this->userManager = $container->get('fos_user.user_manager');
	}

	public function load(ObjectManager $manager)
	{
		$user = $this->userManager->createUser();
		$user->setUsername('john');
		$user->setEmail('john@bensaidj.com');
		$user->setPlainPassword('nimporte');
		$user->setEnabled(true);

		$this->userManager->updateUser($user);
	}
}
