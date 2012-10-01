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
		$postcard1->setTitle("Hello from TLV");
		$postcard1->setLocation("Tel Aviv, Israel");
		$postcard1->setBody("Hi everybody! I just wanted you to see how beautiful it is here in Tel Aviv. I having a lot of fun! Miss You, Bobby!");
		$postcard1->setPicture("telaviv.jpg");
		$postcard1->setSender($manager->merge($this->getReference('john')));
		$manager->persist($postcard1);

		$postcard2 = new Postcard();
		$postcard2->setTitle("Hello from New York");
		$postcard2->setLocation("New York City, USA");
		$postcard2->setBody("Hi everybody! I just wanted you to see how beautiful it is here in NEW York. I having a lot of fun! Miss You, Bobby!");
		$postcard2->setPicture("nyc.jpg");
		$postcard2->setSender($manager->merge($this->getReference('tony')));
		$manager->persist($postcard2);

		$postcard3 = new Postcard();
		$postcard3->setTitle("Hello from Paris");
		$postcard3->setLocation("Paris, France");
		$postcard3->setBody("Hi everybody! I just wanted you to see how beautiful it is here in Paris. I having a lot of fun! Miss You, Bobby!");
		$postcard3->setPicture("paris.jpg");
		$postcard3->setSender($manager->merge($this->getReference('tessa')));
		$manager->persist($postcard3);

		$postcard4 = new Postcard();
		$postcard4->setTitle("Hello from London");
		$postcard4->setLocation("London, England");
		$postcard4->setBody("Hi everybody! I just wanted you to see how beautiful it is here in London. I having a lot of fun! Miss You, Bobby!");
		$postcard4->setPicture("london.jpg");
		$postcard4->setSender($manager->merge($this->getReference('john')));
		$manager->persist($postcard4);

		$postcard5 = new Postcard();
		$postcard5->setTitle("Hello from Berlin");
		$postcard5->setLocation("Berlin, Germany");
		$postcard5->setBody("Hi everybody! I just wanted you to see how beautiful it is here in Berlin. I having a lot of fun! Miss You, Bobby!");
		$postcard5->setPicture("berlin.jpg");
		$postcard5->setSender($manager->merge($this->getReference('tony')));
		$manager->persist($postcard5);

		$manager->flush();
	}

	public function getOrder()
	{
		return 20;
	}
}
