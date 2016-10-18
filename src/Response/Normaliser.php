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

use Apivore\Core\Contracts\Response\Normaliser as NormaliserContract;
use InvalidArgumentException;

/**
 * Class Normaliser.
 */
class Normaliser implements NormaliserContract
{
    /**
     * @param $response
     * @param $format
     *
     * @return mixed
     */
    public function normalise($response, $format)
    {
        switch ($format) {
            case 'json':
                $response = $this->getJsonUnserialiser()->unserialise($response);
                break;

            case 'xml':
                $response = $this->getXmlUnserialiser()->unserialise($response);
                break;

            case 'plain':
            case 'stream':
                $response = $this->getPlainUnserialiser()->unserialise($response);
                break;

            default:
                throw new InvalidArgumentException('Invalid response format specified.');
                break;
        }

        return $response;
    }

    /**
     * @return Unserialisers\JsonUnserialiser
     */
    protected function getJsonUnserialiser()
    {
        return new Unserialisers\JsonUnserialiser();
    }

    /**
     * @return Unserialisers\XmlUnserialiser
     */
    protected function getXmlUnserialiser()
    {
        return new Unserialisers\XmlUnserialiser();
    }

    /**
     * @return Unserialisers\PlainUnserialiser
     */
    protected function getPlainUnserialiser()
    {
        return new Unserialisers\PlainUnserialiser();
    }
}
