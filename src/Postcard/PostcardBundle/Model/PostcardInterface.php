<?php

namespace Postcard\PostcardBundle\Model;

interface PostcardInterface
{
	function getId();

	function setTitle($tile);

	function getTitle();

	function setLocation($location);

	function getLocation();

	function setBody($body);

	function getBody();

	function setPicture($picture);

	function getPicture();
}
