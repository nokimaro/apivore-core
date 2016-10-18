<?php

/*
 * This file is part of Core.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Apivore\Core\Response\Serialisers;

use Apivore\Core\Contracts\Request\Serialiser;
use Apivore\Payload\Json;

/**
 * Class JsonSerialiser.
 */
class JsonSerialiser implements Serialiser
{
    /**
     * @param $input
     *
     * @return mixed
     */
    public function serialise($input)
    {
        return (new Json())->serialise($input);
    }
}
