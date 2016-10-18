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
use DraperStudio\Payload\Xml;

/**
 * Class XmlUnserialiser.
 */
class XmlUnserialiser implements Unserialiser
{
    /**
     * @param $input
     *
     * @return mixed
     */
    public function unserialise($input)
    {
        return (new Xml())->unserialise($input);
    }
}
