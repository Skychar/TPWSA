<?php

/*
 * This file is part of the FOSOAuthServerBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\OAuthServerBundle\Event;

use FOS\OAuthServerBundle\Model\ClientInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Security\Core\User\UserInterface;

class OAuthEvent extends Event
{
    const PRE_AUTHORIZATION_PROCESS = 'fos_oauth_server.pre_authorization_process';

    const POST_AUTHORIZATION_PROCESS = 'fos_oauth_server.post_authorization_process';

    /**
     * @var UserInterface
     */
    private $user;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var bool
     */
    private $isAuthorizedClient;

    /**
     * @param UserInterface   $user
     * @param ClientInterface $client
     * @param bool            $isAuthorizedClient
     */
    public function __construct(UserInterface $user, ClientInterface $client, $isAuthorizedClient = false)
    {
        $this->user = $user;
        $this->client = $client;
        $this->isAuthorizedClient = $isAuthorizedClient;
    }

    /**
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param bool $isAuthorizedClient
     */
    public function setAuthorizedClient($isAuthorizedClient)
    {
        $this->isAuthorizedClient = $isAuthorizedClient;
    }

    /**
     * @return bool
     */
    public function isAuthorizedClient()
    {
        return $this->isAuthorizedClient;
    }

    /**
     * @return ClientInterface
     */
    public function getClient()
    {
        return $this->client;
    }
}
