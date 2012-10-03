<?php

namespace Postcard\UserBundle\Security\User\Provider;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use \BaseFacebook;
use \FacebookApiException;

class FacebookProvider implements UserProviderInterface
{
	/**
	 * @var Facebook API
	 */
	protected $facebook;

	/**
	 * @var FosUserManager
	 */
	protected $userManager;

	/**
	 * @var The validator
	 */
	protected $validator;

	public function __construct(BaseFacebook $facebook, $userManager, $validator)
    {
        $this->facebook = $facebook;
        $this->userManager = $userManager;
        $this->validator = $validator;
    }

    public function supportsClass($class)
    {
        return $this->userManager->supportsClass($class);
    }

    public function findUserByFbId($fbId)
    {
        return $this->userManager->findUserBy(array('facebookId' => $fbId));
    }

    /**
     * Find a User by email
     *
     * @var $email
     *
     * @return mixed
     */
    public function findUserByEmail($email)
    {
        return $this->userManager->findUserBy(array('email' => $email));
    }

    public function loadUserByUsername($username)
    {
        $user = $this->findUserByFbId($username);

        try {
            $fbdata = $this->facebook->api('/me');
        } catch (FacebookApiException $e) {
            $fbdata = null;
        }

        if (!empty($fbdata)) {

        	if ($user === null) {
        		$user = $this->findUserByEmail($fbdata['email']);
        	}

            if ($user === null) {
                $user = $this->userManager->createUser();
                $user->setEnabled(true);
                $user->setPassword($this->generateRandomPass());
            }

            // TODO use http://developers.facebook.com/docs/api/realtime
            $user->setFBData($fbdata);

            if (count($this->validator->validate($user, 'Facebook'))) {
                // TODO: the user was found obviously, but doesnt match our expectations, do something smart
                throw new UsernameNotFoundException('The facebook user could not be stored');
            }
            $this->userManager->updateUser($user);
        }

        if (empty($user)) {
            throw new UsernameNotFoundException('The user is not authenticated on facebook');
        }

        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$this->supportsClass(get_class($user)) || !$user->getFacebookId()) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getFacebookId());
    }

    private function generateRandomPass()
    {
    	// TODO: implement a real generation
    	return "jklmjklm";
    }
}
