<?php

/*
 * This file is part of Core.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Apivore\Core\Contracts\Request;

use GuzzleHttp\Exception\ClientException;

/**
 * Interface ErrorHandler.
 */
interface ErrorHandler
{
    /**
     * @param ClientException $e
     *
     * @throws RequestFailedException
     */
    public function handle(ClientException $e);
}
