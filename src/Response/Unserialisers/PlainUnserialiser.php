<?php

/*
 * This file is part of Core.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Apivore\Core\Response\Unserialisers;

use Apivore\Core\Contracts\Response\Unserialiser;

/**
 * Class PlainUnserialiser.
 */
class PlainUnserialiser implements Unserialiser
{
    /**
     * @param $input
     *
     * @return mixed
     */
    public function unserialise($input)
    {
        return $input->getContents();
    }
}
