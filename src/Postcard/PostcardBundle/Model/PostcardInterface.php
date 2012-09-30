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
