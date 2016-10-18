<?php

/*
 * This file is part of Core.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Apivore\Core\Response;

use Apivore\Core\Contracts\Response\ErrorHandler as ResponseErrorHandler;
use Apivore\Core\Exceptions\InvalidResponseException;

/**
 * Class ErrorHandler.
 */
class ErrorHandler implements ResponseErrorHandler
{
    /**
     * @param array $data
     *
     * @throws InvalidResponseException
     */
    public function handle(array $data)
    {
        if (empty($data)) {
            throw new InvalidResponseException(
                'Empty response received',
                400,
                null,
                $data
            );
        }
    }
}
