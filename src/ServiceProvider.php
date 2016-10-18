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
use Apivore\Core\Contracts\Request\ErrorHandler as RequestErrorHandler;
use Apivore\Core\Contracts\Response\ErrorHandler as ResponseErrorHandler;
use Apivore\Core\Contracts\Response\Normaliser;
use League\Container\ServiceProvider\AbstractServiceProvider;

/**
 * Class ServiceProvider.
 */
abstract class ServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = [
        HttpClient::class,
        RequestErrorHandler::class,
        ResponseErrorHandler::class,
        Normaliser::class,
    ];

    public function register()
    {
        $this->getContainer()->add(RequestErrorHandler::class, $this->getRequestErrorHandler());
        $this->getContainer()->add(ResponseErrorHandler::class, $this->getResponseErrorHandler());
        $this->getContainer()->add(Normaliser::class, $this->getResponseNormaliser());

        $this->getContainer()->add(Contracts\HttpClient::class, $this->getHttpClient())
                             ->withArgument(RequestErrorHandler::class)
                             ->withArgument(ResponseErrorHandler::class)
                             ->withArgument(Normaliser::class);
    }

    /**
     * @return mixed
     */
    abstract protected function getHttpClient();

    /**
     * @return mixed
     */
    protected function getResponseErrorHandler()
    {
        return Response\ErrorHandler::class;
    }

    /**
     * @return mixed
     */
    protected function getResponseNormaliser()
    {
        return Response\Normaliser::class;
    }

    /**
     * @return mixed
     */
    protected function getRequestErrorHandler()
    {
        return Request\ErrorHandler::class;
    }
}
