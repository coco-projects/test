<?php

    namespace Coco\test;

    use Better\Nanoid\Client;

    class Test
    {
        function getId()
        {
            $client = new Client();
            return $client->produce($size = 32);
        }

        public function getMethod()
        {
            return __METHOD__;
        }
    }