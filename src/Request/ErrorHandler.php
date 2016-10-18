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

use Apivore\Core\Contracts\Request\ErrorHandler as RequestErrorHandler;
use Apivore\Core\Exceptions\RequestFailedException;
use GuzzleHttp\Exception\ClientException;

/**
 * Class ErrorHandler.
 */
class ErrorHandler implements RequestErrorHandler
{
    /**
     * @param ClientException $e
     *
     * @throws RequestFailedException
     */
    public function handle(ClientException $e)
    {
        throw new RequestFailedException(
            $e->getMessage(),
            $e->getCode(),
            null,
            $e->getResponse()
        );
    }
}
