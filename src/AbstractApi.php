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

/**
 * Class AbstractApi.
 */
abstract class AbstractApi
{
    /**
     * @var HttpClient
     */
    protected $client;

    /**
     * AbstractApi constructor.
     *
     * @param HttpClient $client
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param $data
     *
     * @return mixed|object
     */
    protected function hydrateOne($data)
    {
        if (empty($this->model) || empty($this->hydrator)) {
            return (object) $data;
        }

        $incoming = new \Incoming\Processor();

        return $incoming->process($data, new $this->model(), new $this->hydrator());
    }

    /**
     * @param $data
     *
     * @return array|object
     */
    protected function hydrateMany($data)
    {
        if (empty($this->model) || empty($this->hydrator)) {
            return (object) $data;
        }

        $items = [];

        foreach ($data as $item) {
            $items[] = $this->hydrateOne($item);
        }

        return $items;
    }

    /**
      * @param $url
      * @param array $parameters
      *
      * @return mixed
      */
    protected function get($url, $parameters = [])
    {
        $this->client->flushQuery();
        foreach($parameters as $key => $value)
        {
            $this->client->addQuery($key, $value);
        }

        return $this->client->get($url, $parameters);
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
        return call_user_func_array([$this->client, $name], $arguments);
    }
}
