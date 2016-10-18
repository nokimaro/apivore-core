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
use Apivore\Payload\Xml;

/**
 * Class XmlSerialiser.
 */
class XmlSerialiser implements Serialiser
{
    /**
     * @param $input
     *
     * @return mixed
     */
    public function serialise($input)
    {
        return (new Xml())->serialise($input);
    }
}
