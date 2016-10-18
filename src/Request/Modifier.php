<?php

/*
 * This file is part of Core.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Apivore\Core\Request;

use Apivore\Core\Contracts\HttpClient;

/**
 * Class Modifier.
 */
abstract class Modifier
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var array
     */
    protected $arguments;

    /**
     * Modifier constructor.
     *
     * @param HttpClient $httpClient
     * @param array      $arguments
     */
    public function __construct(HttpClient $httpClient, array $arguments)
    {
        $this->httpClient = $httpClient;
        $this->arguments = $arguments;
    }

    /**
     * @return mixed
     */
    abstract public function apply();
}
