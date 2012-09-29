<?php

namespace Postcard\PostcardBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PostcardType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('title')
				->add('location')
				->add('body')
				->add('picture');
	}

	public function getName()
	{
		return 'postcard';
	}
}
