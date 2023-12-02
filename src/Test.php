<?php

declare(strict_types=1);

/**
 * @author Coco
 */

namespace Coco\test;

use Better\Nanoid\Client;

class Test
{
    public function getId()
    {
        $client    = new Client();

        return $client->produce($size = 32);
    }

    public function getMethod()
    {
        return __METHOD__;
    }
}
