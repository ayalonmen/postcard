<?php
namespace Postcard\PostcardBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Postcard\PostcardBundle\Entity\Postcard;

class LoadPostcardData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
	private $container;

	private $postcardManager;

	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
		$this->postcardManager = $container->get('postcard_postcard.postcard_manager');
	}

	public function load(ObjectManager $manager)
	{
		$postcard1 = $this->postcardManager->createPostcard($manager->merge($this->getReference('john')));
		$postcard1->setTitle("Hello from TLV")
				  ->setLocation("Tel Aviv, Israel")
				  ->setBody("Hi everybody! I just wanted you to see how beautiful it is here in Tel Aviv. I having a lot of fun! Miss You, Bobby!")
				  ->setPicture("telaviv.jpg");
		$this->postcardManager->updatePostcard($postcard1, false);

		$postcard2 = $this->postcardManager->createPostcard($manager->merge($this->getReference('tony')));
		$postcard2->setTitle("Hello from New York")
				  ->setLocation("New York City, USA")
				  ->setBody("Hi everybody! I just wanted you to see how beautiful it is here in NEW York. I having a lot of fun! Miss You, Bobby!")
				  ->setPicture("nyc.jpg");
		$this->postcardManager->updatePostcard($postcard2, false);

		$postcard3 = $this->postcardManager->createPostcard($manager->merge($this->getReference('tessa')));
		$postcard3->setTitle("Hello from Paris")
				  ->setLocation("Paris, France")
				  ->setBody("Hi everybody! I just wanted you to see how beautiful it is here in Paris. I having a lot of fun! Miss You, Bobby!")
				  ->setPicture("paris.jpg");
		$this->postcardManager->updatePostcard($postcard3, false);

		$postcard4 = $this->postcardManager->createPostcard($manager->merge($this->getReference('john')));
		$postcard4->setTitle("Hello from London")
				  ->setLocation("London, England")
				  ->setBody("Hi everybody! I just wanted you to see how beautiful it is here in London. I having a lot of fun! Miss You, Bobby!")
				  ->setPicture("london.jpg");
		$this->postcardManager->updatePostcard($postcard4, false);

		$postcard5 = $this->postcardManager->createPostcard($manager->merge($this->getReference('tony')));
		$postcard5->setTitle("Hello from Berlin")
				  ->setLocation("Berlin, Germany")
				  ->setBody("Hi everybody! I just wanted you to see how beautiful it is here in Berlin. I having a lot of fun! Miss You, Bobby!")
				  ->setPicture("berlin.jpg");
		$this->postcardManager->updatePostcard($postcard5);
	}

	public function getOrder()
	{
		return 20;
	}
}
