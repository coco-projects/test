<?php

    declare(strict_types = 1);

    namespace Coco\Tests\Unit;

    use Coco\test\Test;
    use PHPUnit\Framework\TestCase;

    final class ATest extends TestCase
    {
        public function testA()
        {
            $t = new Test();

            $string = 'Coco\test\Test::getMethod';

            $this->assertEquals($string, $t->getMethod());
        }

        public function testB()
        {
            $t = new Test();
            $t->getId();
            $this->assertSame(1, 1);
        }
    }