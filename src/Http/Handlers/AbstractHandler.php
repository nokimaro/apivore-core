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

/**
 * Class AbstractHandler.
 */
abstract class AbstractHandler
{
    /**
     * @var
     */
    protected $httpClient;

    /**
     * AbstractHandler constructor.
     *
     * @param $httpClient
     */
    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return mixed
     */
    abstract public function create();
}
