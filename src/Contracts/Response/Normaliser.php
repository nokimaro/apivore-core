<?php

/*
 * This file is part of Core.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Apivore\Core\Contracts\Response;

/**
 * Interface Normaliser.
 */
interface Normaliser
{
    /**
     * @param $response
     * @param $format
     *
     * @return mixed
     */
    public function normalise($response, $format);
}
