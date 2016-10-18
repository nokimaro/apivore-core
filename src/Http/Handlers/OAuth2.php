<?php

/*
 * This file is part of Core.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Apivore\Core\Http\Handlers;

use GuzzleHttp\HandlerStack;
use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Token\AccessToken;
use Somoza\Psr7\OAuth2Middleware\Bearer as GuzzleSubscriber;

/**
 * Class OAuth2.
 */
abstract class OAuth2 extends AbstractHandler
{
    /**
     * @return mixed
     */
    public function create()
    {
        $stack = HandlerStack::create();

        $provider = new GenericProvider($this->getConfiguration());

        $middleware = new GuzzleSubscriber($provider, $this->getAccessToken());

        $stack->push($middleware);

        return $stack;
    }

    /**
     * @return array
     */
    protected function getConfiguration()
    {
        return [
            'clientId'                => $this->httpClient->getConfig('clientId'),
            'clientSecret'            => $this->httpClient->getConfig('clientSecret'),
            'urlAuthorize'            => $this->getAuthorizeUrl(),
            'urlAccessToken'          => $this->getAccessTokenUrl(),
            'urlResourceOwnerDetails' => $this->getResourceOwnerDetailsUrl(),
        ];
    }

    /**
     * @return array
     */
    protected function getAccessToken()
    {
        return new AccessToken([
            'access_token' => $this->httpClient->getConfig('accessToken'),
        ]);
    }

    abstract protected function getAuthorizeUrl();

    abstract protected function getAccessTokenUrl();

    abstract protected function getResourceOwnerDetailsUrl();
}
