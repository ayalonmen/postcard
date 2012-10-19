<?php
namespace Postcard\PostcardBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Postcard\PostcardBundle\Entity\Postcard;

class LoadPostcardData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$postcard1 = new Postcard();
		$postcard1->setTitle("Hello from TLV")
				  ->setLocation("Tel Aviv, Israel")
				  ->setBody("Hi everybody! I just wanted you to see how beautiful it is here in Tel Aviv. I having a lot of fun! Miss You, Bobby!")
				  ->setPicture("telaviv.jpg")
				  ->setSender($manager->merge($this->getReference('john')));
		$manager->persist($postcard1);

		$postcard2 = new Postcard();
		$postcard2->setTitle("Hello from New York")
				  ->setLocation("New York City, USA")
				  ->setBody("Hi everybody! I just wanted you to see how beautiful it is here in NEW York. I having a lot of fun! Miss You, Bobby!")
				  ->setPicture("nyc.jpg")
				  ->setSender($manager->merge($this->getReference('tony')));
		$manager->persist($postcard2);

		$postcard3 = new Postcard();
		$postcard3->setTitle("Hello from Paris")
				  ->setLocation("Paris, France")
				  ->setBody("Hi everybody! I just wanted you to see how beautiful it is here in Paris. I having a lot of fun! Miss You, Bobby!")
				  ->setPicture("paris.jpg")
				  ->setSender($manager->merge($this->getReference('tessa')));
		$manager->persist($postcard3);

		$postcard4 = new Postcard();
		$postcard4->setTitle("Hello from London")
				  ->setLocation("London, England")
				  ->setBody("Hi everybody! I just wanted you to see how beautiful it is here in London. I having a lot of fun! Miss You, Bobby!")
				  ->setPicture("london.jpg")
				  ->setSender($manager->merge($this->getReference('john')));
		$manager->persist($postcard4);

		$postcard5 = new Postcard();
		$postcard5->setTitle("Hello from Berlin")
				  ->setLocation("Berlin, Germany")
				  ->setBody("Hi everybody! I just wanted you to see how beautiful it is here in Berlin. I having a lot of fun! Miss You, Bobby!")
				  ->setPicture("berlin.jpg")
				  ->setSender($manager->merge($this->getReference('tony')));
		$manager->persist($postcard5);

		$manager->flush();
	}

	public function getOrder()
	{
		return 20;
	}
}
