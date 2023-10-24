<?php

    namespace Coco\test;

    use Better\Nanoid\Client;

    class Test
    {
        function test()
        {
            $client = new Client();

            echo __METHOD__;
            echo PHP_EOL;
            echo $client->produce($size = 32);
            echo PHP_EOL;
        }
    }