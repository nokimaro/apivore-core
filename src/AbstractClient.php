<?php

/*
 * This file is part of Core.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Apivore\Core;

use Apivore\Core\Contracts\HttpClient;
use League\Container\Container;
use ReflectionClass;

/**
 * Class AbstractClient.
 */
abstract class AbstractClient
{
    /**
     * @var mixed|object
     */
    private $httpClient;

    /**
     * AbstractClient constructor.
     */
    public function __construct()
    {
        $this->container = new Container();

        $this->container->addServiceProvider($this->getServiceProvider());

        $this->httpClient = $this->container->get(HttpClient::class);
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function api($name)
    {
        $reflector = new ReflectionClass(get_called_class());
        $namespace = $reflector->getNamespaceName();

        $class = $namespace.'\\Api\\'.$name;

        $apiClass = new $class($this->httpClient);

        $this->httpClient->setApiClass($apiClass);

        return $apiClass;
    }

    /**
     * Call inaccessible methods of this class through the HttpClient.
     *
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->httpClient, $name], $arguments);
    }

    /**
     * @return mixed
     */
    abstract protected function getServiceProvider();
}
