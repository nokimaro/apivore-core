<?php

/*
 * This file is part of Core.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Apivore\Core\Exceptions;

use Exception;

class RequestFailedException extends Exception
{
    private $response;

    public function __construct($message, $code = 0, Exception $previous = null, $response = [])
    {
        parent::__construct($message, $code, $previous);

        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
